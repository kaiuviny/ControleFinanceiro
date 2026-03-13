<?php
session_start();

include_once ( "model/Connect.php");
include_once ("model/Despesas_Variaveis/Despesas_VariaveisVO.php");
include_once ("model/Despesas_Variaveis/Despesas_VariaveisDAO.php");
include_once("model/Despesas_Variaveis/Despesas_VariaveisModel.php");

class Despesas_VariaveisController{

    public function listar(){
         if (empty($_GET["mes_id"])){
            $_GET["mes_id"] = date("m");
            $_SESSION['mes_id'] = $_GET["mes_id"];
        }
        if(empty($_GET['ano'])){
            $_GET['ano'] = date("Y");
            $_SESSION['ano'] = $_GET['ano'];
        }
        if(empty($_SESSION['msg'])){
            $_SESSION["cod_msg"] = 0;
            $_SESSION['msg']="";
        }
        $_SESSION['user'] = "kaiuviny";
        $_SESSION['cod_group_user'] = 1;
        $_SESSION['mes_id'] = $_GET['mes_id'];
        $_SESSION['ano'] = $_GET['ano'];
        $_SESSION['page'] = 'Despesas_Variaveis';

        $model = new Despesas_VariaveisModel();
        $_SESSION['data_despesas_variaveis'] = $model->getAllModel(1, $_GET['mes_id'], $_GET['ano']);

        include("view/despesas_variaveis/despesas_variaveis.php");
    }

    public function novo(){
        $_SESSION["user"] = "kaiuviny";
        $_SESSION["cod_user"] = 1;
        include ("view/despesas_variaveis/cadastro_despesas_variaveis.php");
    }

    public function salvar(){
        $model = new Despesas_VariaveisModel();
        $vo    = new Despesas_VariaveisVO();

        $dataString = $_POST['txtDataUtilizada'];
        try{ 
            $date = new DateTime($dataString);
            $mes_id = $date->format('m');
            $ano = $date->format('Y');
            $dia = $date->format('d');
        }
        catch(Exception $e){
            $mes_id = date('m');
            $ano = date('Y');
            $dia = date('d');
        }
        //$dataArray = explode("-", $dataString);


        $vo->setCodigo_grupo_usuarios($_SESSION['cod_user']);
        $vo->setDescricao($_POST['txtDescricao']);
        $vo->setTipo_estabelecimento_id($_POST['slcTipoEstabelecimento']);
        $vo->setEstabelecimento_id($_POST['slcEstabelecimento']);
        $vo->setValor($_POST['txtValor']);
        $vo->setCategoria_despesas_variaveis_id($_POST['slcCategoria']);
        $vo->setData_utilizada($_POST['txtDataUtilizada']);
        $vo->setAno($ano);
        $vo->setMes_id($mes_id);
        $vo->setDia($dia);
        if(isset($_POST['txtObservacaoEstabelecimento'])){
            $vo->setObservacao_estabelecimento($_POST['txtObservacaoEstabelecimento']);
        }
        else{
            $vo->setObservacao_estabelecimento("");
        }
        if(isset($_POST['slcFormaPagamento'])){
            $vo->setForma_pagamento_id($_POST['slcFormaPagamento']);
        }
        else{
            $vo->setForma_pagamento_id(3); // 3 = Cartao de credito
        }
        if(isset($_POST['slcCartao'])){
            $vo->setCartao_id($_POST['slcCartao']);
        }
        else{
            $vo->setCartao_id(6); // 6 = Cartao de credito padrao pessoal
        }
        $vo->setUser_update($_SESSION['user']);

        
        /*echo "<p>cod_user: " . $vo->getCodigo_grupo_usuarios() . "<br />".
             "txtDescricao: ". $vo->getDescricao() . "<br />" . 
             "slcTipoEstabelecimento: " . $vo->getTipo_estabelecimento_id() . "<br />".
             "slcEstabelecimento: " . $vo->getEstabelecimento_id() . "<br />".
             "txtValor: " . $vo->getValor() . "<br />".
             "slcCategoria: " . $vo->getCategoria_despesas_variaveis_id() . "<br />".
             "txtDataUtilizada: " . $vo->getData_utilizada() . "<br />".
             "txtDia: " . $vo->getDia() . "<br />".
             "txtMes_id: " . $vo->getMes_id() . "<br />".
             "txtAno: " . $vo->getAno() . "<br />".
             "user: " . $vo->getUser_update() . "</p>";*/

        if($model->insertModel($vo)){
            $_SESSION["cod_msg"] = 1;
            $_SESSION['msg'] = "Despesa Variavel " . $vo->getDescricao() . " cadastrado com sucesso!";
        }
        else{
            $_SESSION["cod_msg"] = 0;
            $_SESSION["msg"] = "OPS! Ocorreu um erro ao cadastrar uma despesa fixa.";
        }

        //include ("view/despesas/despesas_variaveis.php");
        header("Location: ?Controller=Despesas_Variaveis&Action=listar&mes_id=".$vo->getMes_id()."&ano=".date('Y'));
        
    }
}
?>
