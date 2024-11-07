<?php
session_start();

include_once ("model/Connect.php");
include_once ("model/Despesas_Variaveis/Despesas_VariaveisVO.php");
include_once ("model/Despesas_Variaveis/Despesas_VariaveisDAO.php");
class Despesas_VariaveisController{

    public function listar(){
        $_SESSION['user'] = "kaiuviny";
        $_SESSION['cod_group_user'] = 1;
        $_SESSION['mes_id'] = $_GET['mes'];
        $_SESSION['page'] = 'Despesas_Variaveis';

        include("view/despesas_variaveis/despesas_variaveis.php");

    }
}
?>