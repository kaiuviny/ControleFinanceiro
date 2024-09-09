
    <?php
    session_start();
    $_SESSION['cod_group_user'] = 1; //remover apos testes, será recebido valor no login
    include_once("../../model/Connect.php");

    if($_REQUEST['action'] == "action"){

        $conn = new Connect();
        $conn->getConnection();

        $query = "SELECT
                     (SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DIVIDA_DO_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DESPESA_FIXAS_DO_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DESPESAS_VARIAVEIS_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND data_recebimento <= CURRENT_DATE() AND mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND data_recebimento <= CURRENT_DATE() AND mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) END) AS TOTAL_RECEBIMENTOS_BRUTO_MES
                    ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(pd.valor_pago) > 0 THEN SUM(pd.valor_pago) ELSE 0 END FROM pagamento_dividas AS pd INNER JOIN dividas AS d  ON pd.minha_divida_id = d.id_minha_divida WHERE pd.mes_id = MONTH(CURDATE()) AND d.codigo_grupo_usuarios = 1) IS NULL THEN 0 ELSE  (SELECT CASE WHEN SUM(pd.valor_pago) > 0 THEN SUM(pd.valor_pago) ELSE 0 END FROM pagamento_dividas AS pd INNER JOIN dividas AS d  ON pd.minha_divida_id = d.id_minha_divida WHERE pd.mes_id = MONTH(CURDATE()) AND d.codigo_grupo_usuarios = 1) END) AS TOTAL_DIVIDA_PAGAS


                    /*
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
                        GROUP BY codigo_grupo_usuarios) AS RECEBIMENTOS_TOTAIS,
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
                        GROUP BY codigo_grupo_usuarios))) AS DESPESAS_X_RECEBIMENTOS*/
                        ;";

        $result = $conn->execReader($query);
        $rs = $result->fetch_array();
        echo json_encode($rs);

       // echo "R$ " . number_format($rs["DEPESAS_TOTAIS"], 2, ',', '.');
       
        
        /*$rows = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)){
            $rows[] = array("R$ " . number_format($rs["DEPESAS_TOTAIS"], 2, ',', '.'));
            $rows[] = $rs;
        }
        json_encode($rows[]);*/


    }
    
    
    ?>


