<?php
//if($_REQUEST['action'] == "action"){
session_start();
include_once("../../model/Connect.php");
$_SESSION['cod_group_user'] = 1; //remover apos testes, será recebido valor no login
$grupo = $_SESSION['cod_group_user'];
$conn = new Connect();   
$db = $conn->getConnection();

// Boas práticas: definir tipo de resposta como JSON
header('Content-Type: application/json');

/* preprared-statement para evitar SQAL-Injection */
$stmt = $db->prepare("CALL sp_fin_resumo_grupo_usuario(?)");
$stmt->bind_param("i", $grupo);
$stmt->execute();

/* a procedure devolve **1** result‑set com 13 colunas */
$result = $stmt->get_result();
$resumo_grupo_usuario = $result->fetch_assoc();

// Retorna dados em array
//print_r($resumo_grupo_usuario);

// Retorna os dados como JSON
echo json_encode($resumo_grupo_usuario); 

/* boa prática: consumir qq. result‑set “oculto” e fechar */
$result->free();
while($db->more_results() && $db->next_result()) {
    //$db->use_results();// limpa buffers
}
$stmt->close();
//}
?>