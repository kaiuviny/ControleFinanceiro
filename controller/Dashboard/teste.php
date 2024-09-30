
    <?php
    session_start();
    $_SESSION['cod_group_user'] = 1; //remover apos testes, será recebido valor no login
    include_once("../../model/Connect.php");

    if($_REQUEST['action'] == "action"){

        $conn = new Connect();
        $conn->getConnection();

        $query = "SELECT
                     (SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DIVIDA_SOMENTE_ESTE_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(pd.valor_pago) > 0 THEN SUM(pd.valor_pago) ELSE 0 END FROM pagamento_dividas AS pd INNER JOIN dividas AS d ON pd.minha_divida_id = d.id_minha_divida WHERE d.codigo_grupo_usuarios = 1 AND pd.mes_id = MONTH(CURDATE()) AND pd.ano = YEAR(CURDATE()) GROUP BY d.codigo_grupo_usuarios) IS NULL THEN 0 ELSE  (SELECT CASE WHEN SUM(pd.valor_pago) > 0 THEN SUM(pd.valor_pago) ELSE 0 END FROM pagamento_dividas AS pd INNER JOIN dividas AS d  ON pd.minha_divida_id = d.id_minha_divida WHERE d.codigo_grupo_usuarios = 1 AND pd.mes_id = MONTH(CURDATE()) AND pd.ano = YEAR(CURDATE()) GROUP BY d.codigo_grupo_usuarios) END) AS TOTAL_DIVIDA_PAGAS_SOMENTE_ESTE_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(d.valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas AS d LEFT JOIN pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE d.codigo_grupo_usuarios = 1 AND d.data_inicial <= CURRENT_DATE() AND pd.valor_pago IS NULL) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(d.valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas AS d LEFT JOIN pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE d.codigo_grupo_usuarios = 1 AND d.data_inicial <= CURRENT_DATE() AND pd.valor_pago IS NULL) END) AS TOTAL_DIVIDA_NAO_PAGAS_SOMENTE_ESTE_MES
                    
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DESPESA_FIXAS_DO_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(pdf.valor_pago) > 0 THEN SUM(pdf.valor_pago) ELSE 0 END FROM pagamento_despesas_fixas AS pdf INNER JOIN despesas_fixas AS df ON pdf.despesa_fixa_id = df.id_despesa_fixa WHERE df.codigo_grupo_usuarios = 1 AND pdf.mes_id = MONTH(CURDATE()) AND pdf.ano = YEAR(CURDATE()) GROUP BY df.codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(pdf.valor_pago) > 0 THEN SUM(pdf.valor_pago) ELSE 0 END FROM pagamento_despesas_fixas AS pdf INNER JOIN despesas_fixas AS df ON pdf.despesa_fixa_id = df.id_despesa_fixa WHERE df.codigo_grupo_usuarios = 1 AND pdf.mes_id = MONTH(CURDATE()) AND pdf.ano = YEAR(CURDATE()) GROUP BY df.codigo_grupo_usuarios) END) AS TOTAL_DESPESAS_FIXAS_PAGAS
                    ,'7394.50' AS TOTAL_DESPESAS_FIXAS_NAO_PAGAS_ESTE_MES

                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DESPESAS_VARIAVEIS_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND data_recebimento <= CURRENT_DATE() AND mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND data_recebimento <= CURRENT_DATE() AND mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) END) AS TOTAL_RECEBIMENTOS_BRUTO_MES

                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(pdv.valor_pago) > 0 THEN SUM(pdv.valor_pago) ELSE 0 END FROM pagamento_despesas_variaveis AS pdv INNER JOIN despesas_variaveis AS dv ON pdv.id_pagamento_despesa_variavel = dv.id_despesa_variavel WHERE dv.codigo_grupo_usuarios = 1 AND dv.mes_id = MONTH(CURDATE()) AND dv.ano = YEAR(CURDATE()) AND data_pagamento <= CURRENT_DATE() GROUP BY dv.codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(pdv.valor_pago) > 0 THEN SUM(pdv.valor_pago) ELSE 0 END FROM pagamento_despesas_variaveis AS pdv INNER JOIN despesas_variaveis AS dv ON pdv.id_pagamento_despesa_variavel = dv.id_despesa_variavel WHERE dv.codigo_grupo_usuarios = 1 AND dv.mes_id = MONTH(CURDATE()) AND dv.ano = YEAR(CURDATE()) AND data_pagamento <= CURRENT_DATE() GROUP BY dv.codigo_grupo_usuarios) END) AS TOTAL_DESPESAS_VARIAVEIS_PAGAS
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM((r.valor_recebido-(CASE WHEN dr.valor_descontado IS NULL THEN 0 ELSE dr.valor_descontado END))) > 0 THEN SUM((r.valor_recebido-(CASE WHEN dr.valor_descontado IS NULL THEN 0 ELSE dr.valor_descontado END))) ELSE 0 END FROM recebimentos AS r LEFT JOIN descontos_recebimentos AS dr ON r.id_recebimento = dr.recebimento_id WHERE r.codigo_grupo_usuarios = 1 AND r.mes_id = MONTH(CURDATE()) AND r.ano = YEAR(CURDATE()) AND r.data_recebimento <= CURRENT_DATE() GROUP BY r.codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM((r.valor_recebido-(CASE WHEN dr.valor_descontado IS NULL THEN 0 ELSE dr.valor_descontado END))) > 0 THEN SUM((r.valor_recebido-(CASE WHEN dr.valor_descontado IS NULL THEN 0 ELSE dr.valor_descontado END))) ELSE 0 END FROM recebimentos AS r LEFT JOIN descontos_recebimentos AS dr ON r.id_recebimento = dr.recebimento_id WHERE r.codigo_grupo_usuarios = 1 AND r.mes_id = MONTH(CURDATE()) AND r.ano = YEAR(CURDATE()) AND r.data_recebimento <= CURRENT_DATE() GROUP BY r.codigo_grupo_usuarios) END) AS TOTAL_RECEBIMENTOS_LIQUIDOS
                    ;";

        $result = $conn->execReader($query);
        $rs = $result->fetch_array();
        echo json_encode($rs);
    }
    
    ?>


