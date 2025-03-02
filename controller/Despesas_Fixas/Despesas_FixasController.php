<?php
session_start();

include_once("model/Connect.php");
include_once("model/Despesas_Fixas/Despesas_FixasVO.php");
include_once("model/Despesas_Fixas/Despesas_FixasDAO.php");
include_once("model/Despesas_Fixas/Despesas_FixasModel.php");

class Despesas_FixasController{
    public function Despesas_FixasController(){}

    public function salvar(){
        $model = new Despesas_FixasModel();
        $vo = new Despesas_FixasVO();

        $vo->setCodigo_grupo_usuarios($_SESSION["cod_user"]);
        $vo->setCategoria_despesas_fixas_id($_POST["slcCategoria"]);
        $vo->setMes_id($_POST["slcMes"]);
        $vo->setAno($_POST["txtAno"]);
        $vo->setDescricao($_POST["txtDescricao"]);
        $vo->setVencimento($_POST["txtVencimento"]);
        $vo->setValor($_POST["txtValor"]);
        $vo->setStatus($_POST["slcStatus"]);
        $vo->setUser_update($_SESSION["user"]);
        
        if($model->insertModel($vo)){
            $_SESSION["msg"] = "Despesa fixa " . $vo->getDescricao() . " cadastrada com sucesso!";
        }
        else{
            $_SESSION["msg"] = "OPS! Ocorreu um erro ao cadastrar uma despesa fixa.";
        }

        //include ("view/despesas/despesas_fixas.php");
        header("Location: ?Controller=Despesas_Fixas&Action=listar&mes=".$vo->getMes_id());
        
    }

    public function atualizar(){
        $model = new Despesas_FixasModel();
        $vo = new Despesas_FixasVO();

        $vo->setCategoria_despesas_fixas_id($_POST["slcCategoria"]);
        $vo->setMes_id($_POST["slcMes"]);
        $vo->setAno($_POST["txtAno"]);
        $vo->setDescricao($_POST["txtDescricao"]);
        $vo->setVencimento($_POST["txtVencimento"]);
        $vo->setValor($_POST["txtValor"]);
        $vo->setStatus($_POST["slcStatus"]);
        $vo->setUser_update($_POST["txtUser"]);
        $vo->setId_despesa_fixa($_POST["txtId_despesa_fixa"]);

        if($model->updateModel($vo)){
            $_SESSION["msg"] = "Despesas Fixa atualizada com sucesso!";
        }
        else{
            $_SESSION["msg"] = "OPS! Ocorreu um erro ao atualizar a despesa fixa.";
        }

        include ("view/despesas_fixas/despesas_fixas.php");
    }

    public function deletar(){
        $model = new Despesas_FixasModel();

  
        $vo = $model->getByIdModel($_GET["id"]);
        if($model->deleteModel($vo)){
            $_SESSION["msg"] = "Despesa Fixa n. " ; $_GET['id'] . " removida com sucesso! ";
            header("Location: ?Controller=Despesas_Fixas&Action=listar");
        }
        else{
            $_SESSION["msg"] = "Despesa Fixa n. " ; $_GET['id'] . " removida com sucesso! ";
            header("Location: ?Controller=Despesas_Fixas&Action=listar");
        }
    }

    public function novo(){
        $_SESSION["user"] = "kaiuviny";
        $_SESSION["cod_user"] = 1; 
        include ("view/despesas_fixas/cadastro_despesas_fixas.php");
    }

    public function editar(){
        $model = new Despesas_FixasModel();
        $vo = $model->getByIdModel($_GET['id']);

        $_SESSION["id"] = $vo->getId_despesa_fixa();
        $_SESSION["slcCategoria"] = $vo->getCategoria_despesas_fixas_id();
        $_SESSION["slcMes"] = $vo->getMes_id();
        $_SESSION["txtAno"] = $vo->getAno();
        $_SESSION["txtDescricao"] = $vo->getDescricao();
        $_SESSION["txtVencimento"] = $vo->getVencimento();
        $_SESSION["txtValor"] = $vo->getValor();
        $_SESSION["slcStatus"] = $vo->getStatus();

        include("view/despesas_fixas/cadastro_despesas_fixas.php");
    }

    public function pesquisar(){       
    }

    public function listarRegistro(){

    }

    public function listar(){
        $_SESSION["user"] = "kaiuviny";
        $_SESSION["cod_group_user"] = 1;
        $_SESSION['mes_id'] = $_GET["mes"];
        $_SESSION['ano'] = $_GET['ano'];
        $_SESSION['page'] = 'Despesas_Variaveis';

        $model = new Despesas_FixasModel();
        $_SESSION["data_depesas_fixas"] = $model->getAllModel(1, $_GET["mes"], $_GET['ano']);

        include("view/despesas_fixas/despesas_fixas.php");
    }
}
?>