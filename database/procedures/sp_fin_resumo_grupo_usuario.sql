USE controlefinanceiro;
DROP PROCEDURE IF EXISTS sp_fin_resumo_grupo_usuario;
DELIMITER $$

CREATE PROCEDURE sp_fin_resumo_grupo_usuario (IN  p_codigo_grupo INT)
BEGIN
    /* -------- Bloco 1 –‑ métricas simples ------------------------------ */
    SELECT
        /* Dívidas (tabela dividas) */
        IFNULL(SUM(valor_total)              ,0) INTO @tot_divida_valor_total
    FROM   dividas
    WHERE  codigo_grupo_usuarios = p_codigo_grupo
      AND  active = 'Y';

    SELECT
        IFNULL(SUM(valor_parcela)            ,0) INTO @tot_dividas_nao_pagas_mes
    FROM   dividas
    WHERE  codigo_grupo_usuarios = p_codigo_grupo
      AND  active = 'Y'
      AND  MONTH(data_inicial) = MONTH(CURDATE())
      AND  YEAR (data_inicial) = YEAR (CURDATE());

    /* Despesas fixas atuais */
    SELECT
        IFNULL(SUM(df.valor)                 ,0) INTO @tot_desp_fixas_mes
    FROM   despesas_fixas df
    WHERE  df.codigo_grupo_usuarios = p_codigo_grupo
      AND  df.data_inicial       <= CURDATE();

    SELECT
        IFNULL(SUM(pdf.valor_pago)           ,0) INTO @tot_desp_fixas_pagas
    FROM   pagamento_despesas_fixas pdf
    JOIN   despesas_fixas        df  ON df.id_despesa_fixa = pdf.despesa_fixa_id
    WHERE  df.codigo_grupo_usuarios = p_codigo_grupo
      AND  pdf.mes_id = MONTH(CURDATE())
      AND  pdf.ano    = YEAR (CURDATE());

    /* Despesas fixas NÃO pagas este mês e já vencidas este mês */
    SELECT
        IFNULL(SUM(df.valor)                 ,0) INTO @tot_desp_fixas_np_mes
    FROM   despesas_fixas df
    WHERE  df.codigo_grupo_usuarios = p_codigo_grupo
      AND  df.data_inicial <= CURDATE()
      AND  df.active = 'Y'
      AND  df.id_despesa_fixa NOT IN (
         SELECT despesa_fixa_id
         FROM   pagamento_despesas_fixas
         WHERE  mes_id = MONTH(CURDATE())
           AND  ano    = YEAR (CURDATE())
      );

    SELECT
        IFNULL(SUM(df.valor)                 ,0) INTO @tot_desp_fixas_np_vencidas
    FROM   despesas_fixas df
    WHERE  df.codigo_grupo_usuarios = p_codigo_grupo
      AND  df.data_inicial <= CURDATE()
      AND  DAY(df.data_inicial)  <  DAY(CURDATE())
      AND  df.active = 'Y'
      AND  df.id_despesa_fixa NOT IN (
         SELECT despesa_fixa_id
         FROM   pagamento_despesas_fixas
         WHERE  mes_id = MONTH(CURDATE())
           AND  ano    = YEAR (CURDATE())
      );

    /* Pagamento de dívidas já quitadas este mês */
    SELECT
        IFNULL(SUM(pd.valor_pago)            ,0) INTO @tot_dividas_pagas
    FROM   pagamento_dividas pd
    JOIN   dividas           d  ON d.id_minha_divida = pd.minha_divida_id
    WHERE  d.codigo_grupo_usuarios = p_codigo_grupo
      AND  pd.mes_id = MONTH(CURDATE())
      AND  pd.ano    = YEAR (CURDATE());

    /* Parcelas previstas só para este mês ainda não pagas */
    SELECT
        IFNULL(SUM(d.valor_parcela)          ,0) INTO @tot_dividas_np_mes
    FROM   dividas d
    LEFT  JOIN pagamento_dividas pd
           ON  pd.minha_divida_id     = d.id_minha_divida
           AND pd.numero_parcela_paga = 1  -- primeira parcela do mês
           AND pd.ano                 = YEAR(CURDATE())
           AND pd.mes_id              = MONTH(CURDATE())
    WHERE  d.codigo_grupo_usuarios = p_codigo_grupo
      AND  d.data_inicial <= CURDATE()
      AND  pd.valor_pago IS NULL;

    /* Despesas variáveis + recebimentos */
    SELECT
        IFNULL(SUM(valor)                   ,0) INTO @tot_desp_var_mes
    FROM   despesas_variaveis
    WHERE  codigo_grupo_usuarios = p_codigo_grupo
      AND  data_utilizada <= CURDATE()
      AND  mes_id = MONTH(CURDATE())
      AND  ano    = YEAR (CURDATE());

    SELECT
        IFNULL(SUM(valor_recebido)          ,0) INTO @tot_receb_bruto_mes
    FROM   recebimentos
    WHERE  codigo_grupo_usuarios = p_codigo_grupo
      AND  data_recebimento <= CURDATE()
      AND  mes_id = MONTH(CURDATE())
      AND  ano    = YEAR (CURDATE());

    SELECT
        IFNULL(SUM(pdv.valor_pago)          ,0) INTO @tot_desp_var_pagas
    FROM   pagamento_despesas_variaveis pdv
    JOIN   despesas_variaveis         dv ON dv.id_despesa_variavel = pdv.id_pagamento_despesa_variavel
    WHERE  dv.codigo_grupo_usuarios = p_codigo_grupo
      AND  dv.mes_id = MONTH(CURDATE())
      AND  dv.ano    = YEAR (CURDATE())
      AND  pdv.data_pagamento <= CURDATE();

    SELECT
        IFNULL(SUM(r.valor_recebido
               - IFNULL(dr.valor_descontado,0)),0) INTO @tot_receb_liq_mes
    FROM   recebimentos r
    LEFT  JOIN descontos_recebimentos dr ON dr.recebimento_id = r.id_recebimento
    WHERE  r.codigo_grupo_usuarios = p_codigo_grupo
      AND  r.data_recebimento <= CURDATE()
      AND  r.mes_id = MONTH(CURDATE())
      AND  r.ano    = YEAR (CURDATE());

    /* -------- Bloco 2 –‑ total de parcelas vencidas e não pagas -------- */
    /*
       Estratégia:
       1. Geramos uma lista de parcelas de todas as dívidas usando
          CTE recursiva (1 linha por mês/parcela).
       2. Eliminamos as que já estão quitadas.
       3. Somamos apenas as parcelas cujo vencimento < hoje.
    */
    WITH RECURSIVE dividas_base AS (
        SELECT  d.id_minha_divida,
                d.valor_parcela,
                d.data_inicial,
                d.numero_parcelas,
                TIMESTAMPDIFF(MONTH, d.data_inicial, CURDATE())+1 AS meses_ate_hoje
        FROM    dividas d
        WHERE   d.codigo_grupo_usuarios = p_codigo_grupo
          AND   d.active = 'Y'
          AND   d.data_inicial <= CURDATE()
    ),
    gen_parcelas AS (
        /* primeira parcela de cada dívida */
        SELECT  id_minha_divida,
                valor_parcela,
                data_inicial   AS data_parcela,
                1              AS num_parcela,
                numero_parcelas,
                meses_ate_hoje
        FROM    dividas_base
        UNION ALL
        /* parcelas seguintes enquanto houver mês a considerar */
        SELECT  gp.id_minha_divida,
                gp.valor_parcela,
                DATE_ADD(gp.data_parcela, INTERVAL 1 MONTH),
                gp.num_parcela + 1,
                gp.numero_parcelas,
                gp.meses_ate_hoje
        FROM    gen_parcelas gp
        WHERE   gp.num_parcela < LEAST(gp.numero_parcelas, gp.meses_ate_hoje)
    )
    SELECT  IFNULL(SUM(gp.valor_parcela),0)
      INTO  @tot_dividas_np_vencidas
    FROM    gen_parcelas gp
    LEFT   JOIN pagamento_dividas pd
           ON  pd.minha_divida_id     = gp.id_minha_divida
           AND pd.numero_parcela_paga = gp.num_parcela
    WHERE   pd.minha_divida_id IS NULL        -- ainda não paga
      AND   gp.data_parcela < CURDATE();      -- já vencida

    /* -------- Bloco 3 –‑ resultado final -------------------------------- */
    SELECT
        @tot_divida_valor_total      AS TOTAL_DIVIDA_VALOR_TOTAL,
        @tot_dividas_nao_pagas_mes   AS TOTAL_DIVIDAS_NAO_PAGAS_MES,
        @tot_dividas_np_vencidas     AS TOTAL_DIVIDAS_NAO_PAGAS_VENCIDAS,
        @tot_desp_fixas_mes          AS TOTAL_DESPESA_FIXAS_DO_MES,
        @tot_desp_fixas_pagas        AS TOTAL_DESPESAS_FIXAS_PAGAS,
        @tot_desp_fixas_np_mes       AS TOTAL_DESPESAS_FIXAS_NAO_PAGAS_ESTE_MES,
        @tot_desp_fixas_np_vencidas  AS TOTAL_DESPESAS_FIXAS_NAO_PAGAS_VENCIDAS_ESTE_MES,
        @tot_dividas_pagas           AS TOTAL_DIVIDA_PAGAS,
        @tot_dividas_np_mes          AS TOTAL_DIVIDA_NAO_PAGAS_SOMENTE_ESTE_MES,
        @tot_desp_var_mes            AS TOTAL_DESPESAS_VARIAVEIS_MES,
        @tot_receb_bruto_mes         AS TOTAL_RECEBIMENTOS_BRUTO_MES,
        @tot_desp_var_pagas          AS TOTAL_DESPESAS_VARIAVEIS_PAGAS,
        @tot_receb_liq_mes           AS TOTAL_RECEBIMENTOS_LIQUIDOS;
END$$
DELIMITER ;