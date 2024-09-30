<?php
session_start();
$_SESSION['cod_group_user'] = 1; //remover apos testes, será recebido valor no login
include_once("../../model/Connect.php");

$conn = new Connect();
$conn->getConnection();

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

//$rowsDividas=[];            // Armazenar todos os detalhes das dividas cadastradas
//$rowsParcelas=[];           // Armazenar os dados de cada parcela de cada divida 
//$rowsPagamentodividas[];    // Armazenar os pagamentos de cada parcela de cada divida 
//$rowsParcelasFaltantes[];   // Armazenar as parcelas faltantes ou não pagas de cada dívida que estão atrasadas somente

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

echo "<br /><br /><br />";
echo "Array Parcelas das Dividas Faltantes:<br />";
echo json_encode($rowsParcelasFaltantes);

