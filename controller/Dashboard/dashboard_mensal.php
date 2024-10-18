<?php

session_start();
$_SESSION['cod_group_user'] = 1; //remover apos testes, será recebido valor no login
include_once("../../model/Connect.php");
//if($_REQUEST['action'] == "action"){
    $conn = new Connect();
    $conn->getConnection();
    $rsDividas[] = "";



    $query = "SELECT
                  (SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_total) > 0 THEN SUM(valor_total) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND active='Y' GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_total) > 0 THEN SUM(valor_total) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND active='Y' GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DIVIDA_VALOR_TOTAL
                 ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND active='Y' GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas WHERE codigo_grupo_usuarios = 1 AND active='Y' GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DIVIDAS_NAO_PAGAS_MES
                 ,9283.38 AS TOTAL_DIVIDAS_NAO_PAGAS_VENCIDAS

                 ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_fixas WHERE codigo_grupo_usuarios = 1 AND data_inicial <= CURRENT_DATE() GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DESPESA_FIXAS_DO_MES
                 ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(pdf.valor_pago) > 0 THEN SUM(pdf.valor_pago) ELSE 0 END FROM pagamento_despesas_fixas AS pdf INNER JOIN despesas_fixas AS df ON pdf.despesa_fixa_id = df.id_despesa_fixa WHERE df.codigo_grupo_usuarios = 1 AND pdf.mes_id = MONTH(CURDATE()) AND pdf.ano = YEAR(CURDATE()) GROUP BY df.codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(pdf.valor_pago) > 0 THEN SUM(pdf.valor_pago) ELSE 0 END FROM pagamento_despesas_fixas AS pdf INNER JOIN despesas_fixas AS df ON pdf.despesa_fixa_id = df.id_despesa_fixa WHERE df.codigo_grupo_usuarios = 1 AND pdf.mes_id = MONTH(CURDATE()) AND pdf.ano = YEAR(CURDATE()) GROUP BY df.codigo_grupo_usuarios) END) AS TOTAL_DESPESAS_FIXAS_PAGAS
                 ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(df.valor) > 0 THEN SUM(df.valor) ELSE 0 END FROM despesas_fixas AS df WHERE df.codigo_grupo_usuarios = 1 AND df.data_inicial <= CURRENT_DATE() AND df.active = 'Y' AND id_despesa_fixa NOT IN(SELECT despesa_fixa_id FROM pagamento_despesas_fixas AS pdf INNER JOIN despesas_fixas AS df  ON pdf.despesa_fixa_id = df.id_despesa_fixa WHERE pdf.mes_id = MONTH(CURDATE()) AND df.codigo_grupo_usuarios = 1 AND data_inicial <= CURDATE() AND active = 'Y')  GROUP BY df.codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(df.valor) > 0 THEN SUM(df.valor) ELSE 0 END FROM despesas_fixas AS df WHERE df.codigo_grupo_usuarios = 1 AND df.data_inicial <= CURRENT_DATE() AND df.active = 'Y' AND id_despesa_fixa NOT IN(SELECT despesa_fixa_id FROM pagamento_despesas_fixas AS pdf INNER JOIN despesas_fixas AS df  ON pdf.despesa_fixa_id = df.id_despesa_fixa WHERE pdf.mes_id = MONTH(CURDATE()) AND df.codigo_grupo_usuarios = 1 AND data_inicial <= CURDATE() AND active = 'Y')  GROUP BY df.codigo_grupo_usuarios) END) AS TOTAL_DESPESAS_FIXAS_NAO_PAGAS_ESTE_MES
                 ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(df.valor) > 0 THEN SUM(df.valor) ELSE 0 END FROM despesas_fixas AS df WHERE df.codigo_grupo_usuarios = 1 AND df.data_inicial <= CURRENT_DATE() AND DAY(df.data_inicial) < DAY(curdate()) AND df.active = 'Y' AND id_despesa_fixa NOT IN(SELECT despesa_fixa_id FROM pagamento_despesas_fixas AS pdf INNER JOIN despesas_fixas AS df  ON pdf.despesa_fixa_id = df.id_despesa_fixa WHERE pdf.mes_id = MONTH(CURDATE()) AND df.codigo_grupo_usuarios = 1 AND data_inicial <= CURDATE() AND active = 'Y')  GROUP BY df.codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(df.valor) > 0 THEN SUM(df.valor) ELSE 0 END FROM despesas_fixas AS df WHERE df.codigo_grupo_usuarios = 1 AND df.data_inicial <= CURRENT_DATE() AND DAY(df.data_inicial) < DAY(curdate()) AND df.active = 'Y' AND id_despesa_fixa NOT IN(SELECT despesa_fixa_id FROM pagamento_despesas_fixas AS pdf INNER JOIN despesas_fixas AS df  ON pdf.despesa_fixa_id = df.id_despesa_fixa WHERE pdf.mes_id = MONTH(CURDATE()) AND df.codigo_grupo_usuarios = 1 AND data_inicial <= CURDATE() AND active = 'Y')  GROUP BY df.codigo_grupo_usuarios) END) AS TOTAL_DESPESAS_FIXAS_NAO_PAGAS_VENCIDAS_ESTE_MES

                ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(pd.valor_pago) > 0 THEN SUM(pd.valor_pago) ELSE 0 END FROM pagamento_dividas AS pd INNER JOIN dividas AS d ON pd.minha_divida_id = d.id_minha_divida WHERE d.codigo_grupo_usuarios = 1 AND pd.mes_id = MONTH(CURDATE()) AND pd.ano = YEAR(CURDATE()) GROUP BY d.codigo_grupo_usuarios) IS NULL THEN 0 ELSE  (SELECT CASE WHEN SUM(pd.valor_pago) > 0 THEN SUM(pd.valor_pago) ELSE 0 END FROM pagamento_dividas AS pd INNER JOIN dividas AS d  ON pd.minha_divida_id = d.id_minha_divida WHERE d.codigo_grupo_usuarios = 1 AND pd.mes_id = MONTH(CURDATE()) AND pd.ano = YEAR(CURDATE()) GROUP BY d.codigo_grupo_usuarios) END) AS TOTAL_DIVIDA_PAGAS
                ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(d.valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas AS d LEFT JOIN pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE d.codigo_grupo_usuarios = 1 AND d.data_inicial <= CURRENT_DATE() AND pd.valor_pago IS NULL) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(d.valor_parcela) > 0 THEN SUM(valor_parcela) ELSE 0 END FROM dividas AS d LEFT JOIN pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE d.codigo_grupo_usuarios = 1 AND d.data_inicial <= CURRENT_DATE() AND pd.valor_pago IS NULL) END) AS TOTAL_DIVIDA_NAO_PAGAS_SOMENTE_ESTE_MES
                
                

                ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor) > 0 THEN SUM(VALOR) ELSE 0 END FROM despesas_variaveis WHERE codigo_grupo_usuarios = 1 AND data_utilizada <= CURRENT_DATE() AND mes_id = MONTH(CURRENT_DATE()) GROUP BY codigo_grupo_usuarios) END) AS TOTAL_DESPESAS_VARIAVEIS_MES
                ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND data_recebimento <= CURRENT_DATE() AND mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(valor_recebido) > 0 THEN SUM(valor_recebido) ELSE 0 END FROM recebimentos WHERE codigo_grupo_usuarios = 1 AND data_recebimento <= CURRENT_DATE() AND mes_id = MONTH(CURDATE()) AND ano = YEAR(CURDATE()) GROUP BY codigo_grupo_usuarios) END) AS TOTAL_RECEBIMENTOS_BRUTO_MES

                ,(SELECT CASE WHEN (SELECT CASE WHEN SUM(pdv.valor_pago) > 0 THEN SUM(pdv.valor_pago) ELSE 0 END FROM pagamento_despesas_variaveis AS pdv INNER JOIN despesas_variaveis AS dv ON pdv.id_pagamento_despesa_variavel = dv.id_despesa_variavel WHERE dv.codigo_grupo_usuarios = 1 AND dv.mes_id = MONTH(CURDATE()) AND dv.ano = YEAR(CURDATE()) AND data_pagamento <= CURRENT_DATE() GROUP BY dv.codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM(pdv.valor_pago) > 0 THEN SUM(pdv.valor_pago) ELSE 0 END FROM pagamento_despesas_variaveis AS pdv INNER JOIN despesas_variaveis AS dv ON pdv.id_pagamento_despesa_variavel = dv.id_despesa_variavel WHERE dv.codigo_grupo_usuarios = 1 AND dv.mes_id = MONTH(CURDATE()) AND dv.ano = YEAR(CURDATE()) AND data_pagamento <= CURRENT_DATE() GROUP BY dv.codigo_grupo_usuarios) END) AS TOTAL_DESPESAS_VARIAVEIS_PAGAS
                ,(SELECT CASE WHEN (SELECT CASE WHEN SUM((r.valor_recebido-(CASE WHEN dr.valor_descontado IS NULL THEN 0 ELSE dr.valor_descontado END))) > 0 THEN SUM((r.valor_recebido-(CASE WHEN dr.valor_descontado IS NULL THEN 0 ELSE dr.valor_descontado END))) ELSE 0 END FROM recebimentos AS r LEFT JOIN descontos_recebimentos AS dr ON r.id_recebimento = dr.recebimento_id WHERE r.codigo_grupo_usuarios = 1 AND r.mes_id = MONTH(CURDATE()) AND r.ano = YEAR(CURDATE()) AND r.data_recebimento <= CURRENT_DATE() GROUP BY r.codigo_grupo_usuarios) IS NULL THEN 0 ELSE (SELECT CASE WHEN SUM((r.valor_recebido-(CASE WHEN dr.valor_descontado IS NULL THEN 0 ELSE dr.valor_descontado END))) > 0 THEN SUM((r.valor_recebido-(CASE WHEN dr.valor_descontado IS NULL THEN 0 ELSE dr.valor_descontado END))) ELSE 0 END FROM recebimentos AS r LEFT JOIN descontos_recebimentos AS dr ON r.id_recebimento = dr.recebimento_id WHERE r.codigo_grupo_usuarios = 1 AND r.mes_id = MONTH(CURDATE()) AND r.ano = YEAR(CURDATE()) AND r.data_recebimento <= CURRENT_DATE() GROUP BY r.codigo_grupo_usuarios) END) AS TOTAL_RECEBIMENTOS_LIQUIDOS
                ;";

    $result = $conn->execReader($query);
    $rsDividas = $result->fetch_array();
  


    // 1- Na regra verifico divida por divida as parcelas que estão em atraso, não pagos nos mêses anteriores a partir da data inicial até a data de hoje, estão ativas do grupo do usuario 

    $query = "SELECT 
                    id_minha_divida,
                    orgao_devedor,
                    MONTH(data_inicial) AS mes_inicial,
                    YEAR(data_inicial) as ano_inicial,
                        valor_parcela,
                        multa_atraso,
                        juros_por_dia_atraso,
                        numero_parcelas,
                            dia_mes_vencimento,
                            data_inicial,
                            date_add(data_inicial, INTERVAL numero_parcelas MONTH) AS data_final,
                            curdate() AS data_hoje,
                                date_add(data_inicial, INTERVAL (TIMESTAMPDIFF(MONTH, CONCAT(YEAR(data_inicial), '-', MONTH(data_inicial), '-', '01'),CONCAT(YEAR(CURDATE()), '-', MONTH(CURDATE()), '-', DAY(LAST_DAY(CURDATE()))))) MONTH) AS data_final_numero_meses,
                                TIMESTAMPDIFF(MONTH, CONCAT(YEAR(data_inicial), '-', MONTH(data_inicial), '-', '01'), CONCAT(YEAR(CURDATE()), '-', MONTH(CURDATE()), '-', DAY(LAST_DAY(CURDATE()))))+1 AS numero_meses_ate_hoje,
                                CASE WHEN (TIMESTAMPDIFF(MONTH, CONCAT(YEAR(data_inicial), '-', MONTH(data_inicial), '-', '01'), CONCAT(YEAR(CURDATE()), '-', MONTH(CURDATE()), '-', DAY(LAST_DAY(CURDATE()))))+1) > numero_parcelas THEN numero_parcelas ELSE (TIMESTAMPDIFF(MONTH, CONCAT(YEAR(data_inicial), '-', MONTH(data_inicial), '-', '01'), CONCAT(YEAR(CURDATE()), '-', MONTH(CURDATE()), '-', DAY(LAST_DAY(CURDATE()))))+1) END AS numero_meses_a_considerar
                FROM
                    dividas AS d
                WHERE
                    d.codigo_grupo_usuarios = 1
                        AND id_minha_divida in (1, 2, 3, 4, 5, 6)
                        AND d.active = 'Y'
                        AND data_inicial <= CURRENT_DATE();";

    $result = $conn->execReader($query);

    $id_minha_divida = 0;
    $data_parcela = "";
    $mes_parcela = 0;
    $ano_parcela = 0;
    $numero_parcela = 1;
    $valor_parcela = 0;

    while($rs = $result->fetch_array(MYSQLI_ASSOC)){
            $rowsDividas[] = $rs;
            $id_minha_divida = $rs['id_minha_divida'];
            do{
                    if($numero_parcela == 1){
                        $queryParcelasDividas = "SELECT
                                        $id_minha_divida AS ID_MINHA_DIVIDA,
                                        DATE('".$rs['data_inicial']."') AS DATA_PARCELA,
                                        MONTH('".$rs['data_inicial']."') AS MES_PARCELA,
                                        YEAR('".$rs['data_inicial']."') AS ANO_PARCELA,
                                        $numero_parcela AS NUMERO_PARCELA,
                                        '".$rs['valor_parcela']."' AS VALOR_PARCELA;";

                        $resultArray = $conn->execReader($queryParcelasDividas);
                        $rsArray = $resultArray->fetch_array(MYSQLI_ASSOC);
                        $rowsParcelas[] = $rsArray;
                        $data_parcela = $rsArray['DATA_PARCELA'];
                        $mes_parcela = $rsArray['MES_PARCELA'];
                        $ano_parcela = $rsArray['ANO_PARCELA'];
                        $valor_parcela = $rsArray['VALOR_PARCELA'];
                        $numero_parcela=$numero_parcela+1;
                    }
                    else{
                        $queryParcelasDividas = "SELECT
                                            $id_minha_divida AS ID_MINHA_DIVIDA,
                                            ADDDATE('$data_parcela', INTERVAL 1 MONTH) AS DATA_PARCELA,
                                            MONTH(ADDDATE('$data_parcela', INTERVAL 1 MONTH)) AS MES_PARCELA,
                                            YEAR(ADDDATE('$data_parcela', INTERVAL 1 MONTH)) AS ANO_PARCELA,
                                            $numero_parcela AS NUMERO_PARCELA,
                                            $valor_parcela AS VALOR_PARCELA
                                        WHERE
                                            ADDDATE('$data_parcela', INTERVAL 1 MONTH) < CURDATE()
                                            ;";
                        $resultArray = $conn->execReader($queryParcelasDividas);
                        if($resultArray->num_rows>0){
                            $rsArray = $resultArray->fetch_array(MYSQLI_ASSOC);
                            $rowsParcelas[] = $rsArray;
                            $data_parcela = $rsArray['DATA_PARCELA'];
                            $mes_parcela = $rsArray['MES_PARCELA'];
                            $ano_parcela = $rsArray['ANO_PARCELA'];
                            $valor_parcela = $rsArray['VALOR_PARCELA'];
                        }
                        $numero_parcela=$numero_parcela+1;
                    }
            }while($numero_parcela<=$rs['numero_meses_a_considerar']);
            $numero_parcela = 1;

            //montar o array por ID_MINHA_DIVIDA para cada parcela paga
            //id_minha_divida, data_parcela, mes_parcela, ano_parcela, numero_parcela, valor_parcela
            $queryPagamentoDividas = "SELECT 
                                            minha_divida_id AS ID_MINHA_DIVIDA,
                                            DATE(data_hora) AS DATA_PARCELA,
                                            mes_id AS MES_PARCELA,
                                            ano AS ANO_PARCELA,
                                            numero_parcela_paga AS NUMERO_PARCELA,
                                            valor_pago AS VALOR_PARCELA
                                        FROM
                                            pagamento_dividas
                                        WHERE
                                            minha_divida_id = ".addslashes($id_minha_divida);
            $resultPagamentoDividas = $conn->execReader($queryPagamentoDividas);
            while($rsPagamentodividas = $resultPagamentoDividas->fetch_array(MYSQLI_ASSOC)){
                $rowsPagamentodividas[] = $rsPagamentodividas;
            }  

    }


    //Usando um array para mapear os dados de id e numero da parcela paga
    $parcelas_pagas = array_map(null, array_column($rowsPagamentodividas, 'ID_MINHA_DIVIDA'), array_column($rowsPagamentodividas, 'NUMERO_PARCELA'));

    //Funcao para encontrar as parcelas que ainda não foram pagas
    $rowsParcelasFaltantes[] = array_filter($rowsParcelas, function($parcela) use ($parcelas_pagas) {
        // Verificando se tanto o id_minha_divida quanto o numero_da_parcela não estão nas parcelas pagas
        return !in_array([$parcela['ID_MINHA_DIVIDA'], $parcela['NUMERO_PARCELA']], $parcelas_pagas);  
    });



    $total =0;
    for($i=0;$i<=47;$i++){
        //echo "<br />Valor Parcelas".$rowsParcelasFaltantes[0][$i]['VALOR_PARCELA']."";
       if((float)$rowsParcelasFaltantes[0][$i]['VALOR_PARCELA']){
        $total +=(float)$rowsParcelasFaltantes[0][$i]['VALOR_PARCELA'];
       }
       $rsDividas["TOTAL_DIVIDAS_NAO_PAGAS_VENCIDAS"] = $total;
        
    }

    /*
    //var_dump($rowsDividas);
    echo "Minha Dividas:<br />";
    //var_dump($rowsDividas);
    echo json_encode($rowsDividas);

    echo "<br /><br /><br />";
    echo "Array Parcelas das  Dividas:<br />";
    echo json_encode($rowsParcelas);

    echo "<br /><br /><br />";
    echo "Array Pagamento das Parcelas das Dividas:<br />";
    echo json_encode($rowsPagamentodividas);
*/
    //echo "<br /><br /><br />";
    //echo "Array Parcelas das Dividas Faltantes:<br />";
    //echo json_encode($rowsParcelasFaltantes);

    //echo "<br /><br /><br />";
    //echo "Array Parcelas das Dividas Faltantes:<br />";
   // echo var_dump($rowsParcelasFaltantes);

    
    

   /* foreach ($rowsParcelasFaltantes as $valor_parcela){
        echo "Numero :$i<br/>";
        echo $valor_parcela[$i]['VALOR_PARCELA']."<br/><br/>";
        $total += (float)$valor_parcela[$i]['VALOR_PARCELA'];
        $i++;
    }*/

   /* for($i=0;$i<=47;$i++){
        echo "<br />Valor Parcelas".$rowsParcelasFaltantes[0][$i]['VALOR_PARCELA']."";
        $total +=(float)$rowsParcelasFaltantes[0][$i]['VALOR_PARCELA'];
    }*/

    //echo "<br /><br /><br />";
    //echo "Valor total das aprcelas : $total<br />";

    //echo "<br /><br /><br />Dividas";
    echo json_encode($rsDividas);

//}
?>

