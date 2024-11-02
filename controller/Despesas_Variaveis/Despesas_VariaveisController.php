<?php
session_start();
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