-- --------------------------------- --
-- GASTOS MENSAIS da PAGINA INICIAL  --
-- --------------------------------- --

-- TABELAS
SELECT * FROM dividas;
SELECT * FROM despesas_fixas;
SELECT * FROM despesas_variaveis;

SELECT * FROM pagamento_dividas;
SELECT * FROM pagamento_despesas_fixas;
SELECT * FROM pagamento_despesas_variaveis;

SELECT * FROM recebimentos;

-- PRIMEIRA LINHA
-- ___________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________
-- DIVITAS TOTAIS DO MÊS
	--  TODAS = QUE ESTÃO VENCIDAS E AS QUE VÃO VENCER AINDA
	SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END AS TOTAL_DIVIDA_DO_MES;
	-- TODAS QUE JÁ VENCERAM
    SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() AND dia_mes_vencimento <= DAY(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() AND dia_mes_vencimento <= DAY(CURDATE()) GROUP BY codigo_grupo_usuarios) END AS TOTAL_DIVIDA_DO_MES_VENCIDAS;
    -- AS QUE JÁ VENCERAM E AINDA NÃO FORAM PAGAS
    SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() AND dia_mes_vencimento <= DAY(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() AND dia_mes_vencimento <= DAY(CURDATE()) GROUP BY codigo_grupo_usuarios) END AS TOTAL_DIVIDA_DO_MES_VENCIDAS;
    -- TODAS QUE VÃO VENCER
    SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() AND dia_mes_vencimento >= DAY(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() AND dia_mes_vencimento >= DAY(CURDATE()) GROUP BY codigo_grupo_usuarios) END AS TOTAL_DIVIDA_DO_MES_VENCIDAS;
    -- AS QUE VÃO VENCER E AINDA NÃO FORAM PAGAS
    SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() AND dia_mes_vencimento >= DAY(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() AND dia_mes_vencimento >= DAY(CURDATE()) GROUP BY codigo_grupo_usuarios) END AS TOTAL_DIVIDA_DO_MES_VENCIDAS;
	
    -- TODAS QUE EU JÁ PAGUEI
	SELECT CASE WHEN (SELECT CASE WHEN SUM(d.valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas AS d LEFT JOIN pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE d.codigo_grupo_usuarios = 1 AND d.data_inicial <= CURRENT_DATE() AND pd.valor_pago IS NULL) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(d.valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas AS d LEFT JOIN pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE d.codigo_grupo_usuarios = 1 AND d.data_inicial <= CURRENT_DATE() AND pd.valor_pago IS NULL) END AS TOTAL_DIVIDA_PAGA_MES;

-- DEPESAS FIXAS TOTAIS DO MÊS				
SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END AS TOTAL_DESPESA_FIXAS_DO_MES;
                
-- DEPESAS VARIÁVEIS TOTAIS DO MÊS
SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) END AS TOTAL_DESPESAS_VARIAVEIS_MES;

-- RECEBIMENTO BRUTO TOTAIS DO MES
SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND data_recebimento <= CURRENT_DATE() AND mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND data_recebimento <= CURRENT_DATE() AND mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) END AS TOTAL_RECEBIMENTOS_BRUTO_MES;

-- ___________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________

-- SEGUNDA LINHA
-- ___________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________
-- DIVITAS PAGAS
SELECT CASE WHEN (SELECT CASE WHEN SUM(pd.valor_pago) > 0 THEN SUM(pd.valor_pago) ELSE 0 END FROM pagamento_dividas AS pd INNER JOIN dividas AS d  ON pd.minha_divida_id = d.id_minha_divida WHERE pd.mes_id = MONTH(CURDATE()) AND d.codigo_grupo_usuarios = 1) IS NULL THEN 0 ELSE  (SELECT CASE WHEN SUM(pd.valor_pago) > 0 THEN SUM(pd.valor_pago) ELSE 0 END FROM pagamento_dividas AS pd INNER JOIN dividas AS d  ON pd.minha_divida_id = d.id_minha_divida WHERE pd.mes_id = MONTH(CURDATE()) AND d.codigo_grupo_usuarios = 1) END AS TOTAL_DIVIDA_PAGAS;

-- DEPESAS FIXAS PAGAS			
SELECT * FROM pagamento_despesas_fixas AS pdf INNER JOIN despesas_fixas AS df ON pdf.despesa_fixa_id = df.id_despesa_fixa WHERE df.codigo_grupo_usuarios = 1 AND pdf.mes_id = MONTH(CURDATE()) AND pdf.ano = YEAR(CURDATE());               
SELECT * FROM despesas_fixas;               
-- DEPESAS VARIÁVEIS TOTAIS DO MÊS
SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) END AS TOTAL_DESPESAS_VARIAVEIS_MES;

-- RECEBIMENTO BRUTO TOTAIS DO MES
SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND /*data_recebimento <= CURRENT_DATE() AND*/ mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND /*data_recebimento <= CURRENT_DATE() AND*/ mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) END AS TOTAL_RECEBIMENTOS_BRUTO_MES;

-- ___________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________



-- MONTANDO A QQUERY
SELECT
                     (SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DIVIDA_DO_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DESPESA_FIXAS_DO_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DESPESAS_VARIAVEIS_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND data_recebimento <= CURRENT_DATE() AND mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND data_recebimento <= CURRENT_DATE() AND mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) END) AS TOTAL_RECEBIMENTOS_BRUTO_MES
;                    



-- 1º Total de dividas e despesas e gastos este mes ||| DESPESAS (Mensais)
-- (dividas + despesas_variaveis + despesas_fixas)


-- 4º Quanto eu tenho em caixa este mes
-- recebimentos;

-- 1º Dividas totais este mes
-- (despesas_fixas + dividas )

-- 2º Dividas pagas este mes
-- (pagamento_despesas_fixas + pagamento_dividas)

-- 3º dividas que tenho que pagar (no futuro, devendo) este mes ainda
-- (despesas_fixas + dividas ) - (pagamento_despesas_fixas + pagamento_dividas)

 SELECT (
			
			  -- DEPESAS FIXAS
			 /* (SELECT CASE WHEN SUM(df.valor)>0 THEN SUM(df.valor) ELSE 0 END FROM despesas_fixas AS df WHERE df.codigo_grupo_usuarios = 1 AND df.data_inicial <= CURDATE() GROUP BY df.codigo_grupo_usuarios)
			 -(SELECT CASE WHEN SUM(pdf.valor_pago)>0 THEN SUM(pdf.valor_pago) ELSE 0 END FROM pagamento_despesas_fixas AS pdf INNER JOIN despesas_fixas AS df ON pdf.despesa_fixa_id = df.id_despesa_fixa WHERE df.data_inicial <= CURDATE() AND df.codigo_grupo_usuarios = 1 AND pdf.mes_id = MONTH(curdate()) AND pdf.ano = YEAR(curdate()) GROUP BY df.codigo_grupo_usuarios)
			
            
            /*+
            (*/
			 -- DIVIDAS
             -- (SELECT CASE WHEN SUM(d.valor_parcela)>0 THEN SUM(d.valor_parcela) ELSE 0 END FROM dividas AS d WHERE d.codigo_grupo_usuarios = 1 AND d.data_inicial <= CURDATE() GROUP BY d.codigo_grupo_usuarios)
			 (SELECT CASE WHEN SUM(pd.valor_pago)>0 THEN SUM(pd.valor_pago) ELSE 0 END FROM pagamento_dividas AS pd INNER JOIN dividas AS d ON pd.minha_divida_id = d.id_minha_divida WHERE d.data_inicial<=CURDATE() AND pd.mes_id = MONTH(CURDATE()) AND pd.ano = MONTH(CURDATE()) AND d.codigo_grupo_usuarios = 1 GROUP BY d.codigo_grupo_usuarios)
           -- )
		) AS DESPESAS_PENDENTES;



-- 5º Quanto eu Recebi bruto e líquido este mes
-- (recebimentos),  (recebimentos - descontos_recebimentos)

-- 6º Quanto eu já paguei e todos os gastos este mes
-- (pagamento_dividas +  pagamento_despesas_variaveis + pagamento_despesas_fixas)


-- QUERY TESTE SOMATORIO COM A TABELA DIVIDAS
SELECT valor_parcela FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE(); -- GROUP BY codigo_grupo_usuarios;
SELECT SUM(valor_parcela) FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios;
SELECT SUM(valor) FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios;
SELECT SUM(valor) FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios;



-- QUERY TESTE SOMATORIO PARA PAGAMENTO DE DIVIDAS
SELECT SUM(valor_pago) FROM pagamento_dividas 			 AS pd  INNER JOIN dividas AS d 			ON pd.minha_divida_id = d.id_minha_divida 				WHERE pd.mes_id  = MONTH(CURDATE()) AND pd.ano =  YEAR(CURDATE()) AND d.codigo_grupo_usuarios  = 1 AND d.data_inicial    <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios;
SELECT SUM(valor_pago) FROM pagamento_despesas_fixas 	 AS pdf INNER JOIN despesas_fixas AS df 	ON pdf.despesa_fixa_id = df.id_despesa_fixa 			WHERE pdf.mes_id = MONTH(CURDATE()) AND pdf.ano = YEAR(CURDATE()) AND df.codigo_grupo_usuarios = 1 AND df.data_inicial   <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios;
SELECT SUM(valor_pago) FROM pagamento_despesas_variaveis AS pdv INNER JOIN despesas_variaveis AS dv ON pdv.despesa_variavel_id = dv.id_despesa_variavel 	WHERE dv.mes_id  = MONTH(CURDATE()) AND dv.ano =  YEAR(CURDATE()) AND dv.codigo_grupo_usuarios = 1 AND dv.data_utilizada <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios;






-- ----------------------------------- --
-- QUERY GASTOS/DIVIDAS X RECEBIMENTOS --
-- ----------------------------------- --
/*
	O QUE ME SOBRARÁ DE DINHEIRO DE ACORDO COM O QUE EU TENHO QUE PAGAR E JÁ GASTEI, VERSUS O QUE JÁ RECEBI
    
    TUDO O QUE TENHO GASTADO E QUANTO EU TENHO QUE PAGAR
    VERSUS
    QUANTO EU RECEBI
    
    

*/

SELECT (
			-- recebimentos
			CASE  WHEN (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND /*data_recebimento <= CURRENT_DATE() AND*/ mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0
            ELSE       (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND /*data_recebimento <= CURRENT_DATE() AND*/ mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) END
			-- dividas
			-(
				 CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas 			WHERE codigo_grupo_usuarios = 1 AND data_inicial   <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0
				 ELSE      (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas 			WHERE codigo_grupo_usuarios = 1 AND data_inicial   <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END
				+CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 		THEN SUM(VALOR) 		ELSE 0 END FROM despesas_fixas		WHERE codigo_grupo_usuarios = 1 AND data_inicial   <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0
				 ELSE      (SELECT CASE WHEN SUM(valor) > 0 		THEN SUM(VALOR) 		ELSE 0 END FROM despesas_fixas		WHERE codigo_grupo_usuarios = 1 AND data_inicial   <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END
                +CASE WHEN (SELECT CASE WHEN SUM(valor) > 0			THEN SUM(VALOR) 		ELSE 0 END FROM despesas_variaveis 	WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0
                 ELSE      (SELECT CASE WHEN SUM(valor) > 0			THEN SUM(VALOR) 		ELSE 0 END FROM despesas_variaveis 	WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) END
			 )
)

-- ------------------------------------- --
-- QUERY GASTOS/PAGAMENTO X RECEBIMENTOS --
-- ------------------------------------- --
/*
	QUANTO EU TENHO EM CAIXA ATUALMENTE
    
    TUDO QUE EU JÁ RECEBI X O QUE JÁ GASTEI E CONTAS QUE JÁ PAGUEI 

*/



-- QUERY DIVIDAS X RECEBIMENTOS
/*
	 TUDO O QUE EU TENHO QUE PAGAR 
	 VERSUS
	 TUDO O QUE EU VOU RECEBER

*/

SELECT (
			-- recebimentos
			CASE  WHEN (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND /*data_recebimento <= CURRENT_DATE() AND*/ mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0
            ELSE       (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND /*data_recebimento <= CURRENT_DATE() AND*/ mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) END
			-- dividas
			-(
				 CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas 			WHERE codigo_grupo_usuarios = 1 AND data_inicial   <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0
				 ELSE      (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas 			WHERE codigo_grupo_usuarios = 1 AND data_inicial   <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END
				+CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 		THEN SUM(VALOR) 		ELSE 0 END FROM despesas_fixas		WHERE codigo_grupo_usuarios = 1 AND data_inicial   <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0
				 ELSE      (SELECT CASE WHEN SUM(valor) > 0 		THEN SUM(VALOR) 		ELSE 0 END FROM despesas_fixas		WHERE codigo_grupo_usuarios = 1 AND data_inicial   <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END
                +CASE WHEN (SELECT CASE WHEN SUM(valor) > 0			THEN SUM(VALOR) 		ELSE 0 END FROM despesas_variaveis 	WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0
                 ELSE      (SELECT CASE WHEN SUM(valor) > 0			THEN SUM(VALOR) 		ELSE 0 END FROM despesas_variaveis 	WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) END
			 )
);




-- --------------------------- --
-- QUERY QUANTO TENHO EM CAIXA --
-- --------------------------- --
/*
	(TUDO QUE EU RECEBEI ) VERSUS ( QUANTO EU JA PAGUEI [dividas + despesas fixas pagas] SOMADO A  DESPESAS VARIAVEIS QUE TO GASTANDO)
    ESSE MENU É VER QUANTO DE DINHEIRO EU TENHO SOBRANDO
    DE ACORDO COM TUDO QUE EU JÁ PAGUEI E TO GASTANDO
*/



-- ---------------------- --
-- MONTANDO A QUERY TOTAL --
-- ---------------------- --
SELECT 
			(
				SELECT CASE WHEN 
					(SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) 
							ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios)
							IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END
			) AS TOTAL_DIVIDA_DO_MES;

-- -------------------------------- --
-- QUERY ACIMA FORMATADA E IDENTADA --
-- -------------------------------- --
SELECT 
	(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DIVIDA_DO_MES, 
                    
    (SELECT 
            (SELECT 
                        CASE
                                WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela)
                                ELSE 0
                            END
                    FROM
                        dividas
                    WHERE
                        codigo_grupo_usuarios = 1
                            AND data_inicial <= CURRENT_DATE()
                    GROUP BY codigo_grupo_usuarios) + (SELECT 
                        CASE
                                WHEN SUM(valor) > 0 THEN SUM(valor)
                                ELSE 0
                            END
                    FROM
                        despesas_fixas
                    WHERE
                        codigo_grupo_usuarios = 1
                            AND data_inicial <= CURRENT_DATE()
                    GROUP BY codigo_grupo_usuarios) + (SELECT 
                        CASE
                                WHEN SUM(valor) > 0 THEN SUM(valor)
                                ELSE 0
                            END
                    FROM
                        despesas_variaveis
                    WHERE
                        codigo_grupo_usuarios = 1
                            AND data_utilizada <= CURRENT_DATE()
                            AND mes_id = MONTH(CURRENT_DATE())
                            AND ano = YEAR(CURDATE())
                    GROUP BY codigo_grupo_usuarios)
        ) AS DESPESAS_TOTAIS,
    (SELECT 
            (SELECT 
                        SUM(valor_pago)
                    FROM
                        pagamento_dividas AS pd
                            INNER JOIN
                        dividas AS d ON pd.minha_divida_id = d.id_minha_divida
                    WHERE
                        pd.mes_id = MONTH(CURDATE())
                            AND pd.ano = YEAR(CURDATE())
                            AND d.codigo_grupo_usuarios = 1
                            AND d.data_inicial <= CURRENT_DATE()
                    GROUP BY codigo_grupo_usuarios) + (SELECT 
                        SUM(valor_pago)
                    FROM
                        pagamento_despesas_fixas AS pdf
                            INNER JOIN
                        despesas_fixas AS df ON pdf.despesa_fixa_id = df.id_despesa_fixa
                    WHERE
                        pdf.mes_id = MONTH(CURDATE())
                            AND pdf.ano = YEAR(CURDATE())
                            AND df.codigo_grupo_usuarios = 1
                            AND df.data_inicial <= CURRENT_DATE()
                    GROUP BY codigo_grupo_usuarios) + (SELECT 
                        SUM(valor_pago)
                    FROM
                        pagamento_despesas_variaveis AS pdv
                            INNER JOIN
                        despesas_variaveis AS dv ON pdv.despesa_variavel_id = dv.id_despesa_variavel
                    WHERE
                        dv.mes_id = MONTH(CURDATE())
                            AND dv.ano = YEAR(CURDATE())
                            AND dv.codigo_grupo_usuarios = 1
                            AND dv.data_utilizada <= CURRENT_DATE()
                    GROUP BY codigo_grupo_usuarios)
        ) AS DIVIDAS_PAGAS_TOTAIS,
    (SELECT 
            SUM(valor_pago)
        FROM
            pagamento_dividas AS pd
                INNER JOIN
            dividas AS d ON pd.minha_divida_id = d.id_minha_divida
        WHERE
            pd.mes_id = MONTH(CURDATE())
                AND pd.ano = YEAR(CURDATE())
                AND d.codigo_grupo_usuarios = 1
                AND d.data_inicial <= CURRENT_DATE()
        GROUP BY codigo_grupo_usuarios) AS DIVIDAS_PAGAS,
    (SELECT 
            SUM(valor_pago)
        FROM
            pagamento_despesas_fixas AS pdf
                INNER JOIN
            despesas_fixas AS df ON pdf.despesa_fixa_id = df.id_despesa_fixa
        WHERE
            pdf.mes_id = MONTH(CURDATE())
                AND pdf.ano = YEAR(CURDATE())
                AND df.codigo_grupo_usuarios = 1
                AND df.data_inicial <= CURRENT_DATE()
        GROUP BY codigo_grupo_usuarios) AS DESPESAS_FIXAS_PAGAS,
    (SELECT 
            SUM(valor_pago)
        FROM
            pagamento_despesas_variaveis AS pdv
                INNER JOIN
            despesas_variaveis AS dv ON pdv.despesa_variavel_id = dv.id_despesa_variavel
        WHERE
            dv.mes_id = MONTH(CURDATE())
                AND dv.ano = YEAR(CURDATE())
                AND dv.codigo_grupo_usuarios = 1
                AND dv.data_utilizada <= CURRENT_DATE()
        GROUP BY codigo_grupo_usuarios) AS DESPESAS_VARIAVEIS_PAGAS,
    (SELECT 
            CASE
                    WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela)
                    ELSE 0
                END
        FROM
            dividas
        WHERE
            codigo_grupo_usuarios = 1
                AND data_inicial <= CURRENT_DATE()
        GROUP BY codigo_grupo_usuarios) AS DIVIDAS,
    (SELECT 
            CASE
                    WHEN SUM(valor) > 0 THEN SUM(valor)
                    ELSE 0
                END
        FROM
            despesas_fixas
        WHERE
            codigo_grupo_usuarios = 1
                AND data_inicial <= CURRENT_DATE()
        GROUP BY codigo_grupo_usuarios) AS DESPESAS_FIXAS,
    (SELECT 
            CASE
                    WHEN SUM(valor) > 0 THEN SUM(valor)
                    ELSE 0
                END
        FROM
            despesas_variaveis
        WHERE
            codigo_grupo_usuarios = 1
                AND data_utilizada <= CURRENT_DATE()
        GROUP BY codigo_grupo_usuarios) AS DESPESAS_VARIAVEIS,
    (SELECT 
            CASE
                    WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido)
                    ELSE 0
                END
        FROM
            recebimentos
        WHERE
            codigo_grupo_usuarios = 1
                AND data_recebimento <= CURRENT_DATE()
                AND mes_id = MONTH(CURDATE())
                AND ano = YEAR(CURDATE())
        GROUP BY codigo_grupo_usuarios) AS RECEBIMENTO_TOTAL_MES_CORRENTE,
    ((SELECT 
            CASE
                    WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido)
                    ELSE 0
                END
        FROM
            recebimentos
        WHERE
            codigo_grupo_usuarios = 1
                AND data_recebimento <= CURRENT_DATE()
                AND mes_id = MONTH(CURDATE())
                AND ano = YEAR(CURDATE())
        GROUP BY codigo_grupo_usuarios) - ((SELECT 
            CASE
                    WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela)
                    ELSE 0
                END
        FROM
            controlefinanceiro.dividas
        WHERE
            codigo_grupo_usuarios = 1
                AND data_inicial <= CURRENT_DATE()
        GROUP BY codigo_grupo_usuarios) + (SELECT 
            CASE
                    WHEN SUM(valor) > 0 THEN SUM(VALOR)
                    ELSE 0
                END
        FROM
            controlefinanceiro.despesas_fixas
        WHERE
            codigo_grupo_usuarios = 1
                AND data_inicial <= CURRENT_DATE()
        GROUP BY codigo_grupo_usuarios) + (SELECT 
            CASE
                    WHEN SUM(valor) > 0 THEN SUM(VALOR)
                    ELSE 0
                END
        FROM
            controlefinanceiro.despesas_variaveis
        WHERE
            codigo_grupo_usuarios = 1
                AND data_utilizada <= CURRENT_DATE()
                AND mes_id = MONTH(CURRENT_DATE())
        GROUP BY codigo_grupo_usuarios))) AS GASTOS_X_RECEBIMENTO;

SELECT CURRENT_DATE(), YEAR(CURRENT_DATE()), MONTH(CURRENT_DATE()), DAY(CURRENT_DATE());



-- ----------------------------------------- --
--  VENDO DIVIDAS NAO PAGAS NOS OUTROS MESES --
-- ----------------------------------------- --
SELECT * FROM dividas AS d INNER JOIN pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE id_minha_divida = 3;

SELECT descricao, orgao_devedor, valor_parcela, valor_pago, concat(numero_parcela_paga, "/", numero_parcelas) as parcelas, concat(mes_id, "/",ano) AS mes_ano_pagamento, data_inicial  FROM dividas AS d INNER JOIN pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE id_minha_divida = 3;
-- 'Re-Financiamento Terreno Portal dos Pássaros', 'ZITUNE', '2940.88', '1772.89', '1/4', '3/2024', '2024-03-22'
-- 'Re-Financiamento Terreno Portal dos Pássaros', 'ZITUNE', '2940.88', '1772.89', '2/4', '4/2024', '2024-03-22'
-- 'Re-Financiamento Terreno Portal dos Pássaros', 'ZITUNE', '2940.88', '1772.89', '3/4', '5/2024', '2024-03-22'

SELECT 
    MAX(numero_parcela_paga),
    numero_parcelas,
    MAX(mes_id),
    mes_id,
    MONTH(CURDATE()),
    ano,
    valor_parcela
FROM
    dividas AS d
        INNER JOIN
    pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id
WHERE
    id_minha_divida = 3;
/*
# numero_parcela_paga, numero_parcelas, mes_id
				'1', 	'4', 			'3'
				'2', 	'4', 			'4'
				'3', 	'4', 			'5' 
*/

SELECT 
    numero_parcela_paga,
    numero_parcelas,
    mes_id,
    MONTH(CURDATE()),
    ano,
    valor_parcela,
    
    ((numero_parcelas - numero_parcela_paga) * valor_parcela) AS 'VALOR DEVIDO'
FROM
    dividas AS d
        INNER JOIN
    pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id
WHERE
    -- id_minha_divida = 3 
	 mes_id < MONTH(CURDATE())
    AND active = 'Y'
    AND data_inicial <= CURRENT_DATE()
ORDER BY numero_parcela_paga DESC, mes_id DESC
LIMIT 10000;


-- ------------------------------------------------------ --
--  TODAS AS DIVIDAS QUE SOMENTE NESSE MES PAGAS E NAO PAGAS --
-- ------------------------------------------------------ --
-- Assim veremos mes a mes quantidade de dividas somente no MES
	SELECT 
    CASE
        WHEN
            (SELECT 
                    CASE
                            WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela)
                            ELSE 0
                        END
                FROM
                    dividas
                WHERE
                    codigo_grupo_usuarios = 1
                        AND data_inicial <= CURRENT_DATE()
                        AND active = 'Y'
                GROUP BY codigo_grupo_usuarios) IS NULL
        THEN
            0
        ELSE (SELECT 
                CASE
                        WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela)
                        ELSE 0
                    END
            FROM
                dividas
            WHERE
                codigo_grupo_usuarios = 1
                    AND data_inicial <= CURRENT_DATE()
                    AND active = 'Y'
            GROUP BY codigo_grupo_usuarios)
    END AS TOTAL_DIVIDA_DO_MES;
	
    -- ---------------------------------- --
    -- TODAS QUE JÁ VENCERAM ATÉ ESTE MÊS --
    -- ---------------------------------- --
    
    /*SELECT 
    CASE
        WHEN
            (*/(SELECT 
                    CASE
                            WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela)
                            ELSE 0
                        END
                        
                FROM
                    dividas AS d 
                WHERE
                    codigo_grupo_usuarios = 1
                        AND data_inicial <= CURRENT_DATE()
                        AND dia_mes_vencimento <= DAY(CURDATE())
                        AND active = 'Y'
                GROUP BY codigo_grupo_usuarios)
                +
                (;SELECT 
								descricao,
								subd.id_minha_divida,
                                max(numero_parcela_paga),
								numero_parcelas,
								mes_id,
								MONTH(CURDATE()),
								ano,
								valor_parcela,
								
								((numero_parcelas - max(numero_parcela_paga)) * valor_parcela) AS 'VALOR DEVIDO'
							FROM
								dividas AS subd
									INNER JOIN
								pagamento_dividas AS subpd ON subd.id_minha_divida = subpd.minha_divida_id
							WHERE
								-- subd.id_minha_divida = 3 AND
								 subpd.mes_id < MONTH(CURDATE())
								AND subd.active = 'Y'
								AND subd.data_inicial <= CURRENT_DATE()
							GROUP BY subd.id_minha_divida
							ORDER BY subpd.numero_parcela_paga DESC, subpd.mes_id DESC;
							LIMIT 1);/*) IS NULL --'4787.99'

        THEN
            0
        ELSE (SELECT 
                CASE
                        WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela)
                        ELSE 0
                    END
            FROM
                dividas
            WHERE
                codigo_grupo_usuarios = 1
                    AND data_inicial <= CURRENT_DATE()
                    AND dia_mes_vencimento <= DAY(CURDATE())
            GROUP BY codigo_grupo_usuarios)
    END AS TOTAL_DIVIDA_DO_MES_VENCIDAS;*/
    
    -- AS QUE JÁ VENCERAM E AINDA NÃO FORAM PAGAS
    /*SELECT 
    CASE
        WHEN
            (*/SELECT 
                    CASE
                            WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela)
                            ELSE 0
                        END,
                     id_minha_divida   
                FROM
                    dividas d left join pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id 
                WHERE
                    codigo_grupo_usuarios = 1
                        AND data_inicial <= CURRENT_DATE()
                        AND dia_mes_vencimento <= DAY(CURDATE())
                        AND valor_pago IS NULL
                        AND active = 'Y'
                GROUP BY codigo_grupo_usuarios/*) IS NULL
        THEN
            0
        ELSE (SELECT 
                CASE
                        WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela)
                        ELSE 0
                    END
            FROM
                dividas
            WHERE
                codigo_grupo_usuarios = 1
                    AND data_inicial <= CURRENT_DATE()
                    AND dia_mes_vencimento <= DAY(CURDATE())
            GROUP BY codigo_grupo_usuarios)
    END AS TOTAL_DIVIDA_DO_MES_VENCIDAS;*/
    
