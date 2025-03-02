<?php
session_start();

include_once ( "model/Connect.php");
include_once ("model/Despesas_Variaveis/Despesas_VariaveisVO.php");
include_once ("model/Despesas_Variaveis/Despesas_VariaveisDAO.php");
include_once("model/Despesas_Variaveis/Despesas_VariaveisModel.php");

class Despesas_VariaveisController{

    public function listar(){
        $_SESSION['user'] = "kaiuviny";
        $_SESSION['cod_group_user'] = 1;
        $_SESSION['mes_id'] = $_GET['mes'];
        $_SESSION['ano'] = $_GET['ano'];
        $_SESSION['page'] = 'Despesas_Variaveis';

        $model = new Despesas_VariaveisModel();
        $_SESSION['data_despesas_variaveis'] = $model->getAllModel(1, $_GET['mes'], $_GET['ano']);

        include("view/despesas_variaveis/despesas_variaveis.php");
    }
}
?>