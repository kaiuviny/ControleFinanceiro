<?php
session_start();

include_once("model/Connect.php");
include_once("model/Dividas/DividasVO.php");
include_once("model/Dividas/DividasDAO.php");
include_once("model/Dividas/DividasModel.php");

class DividasController{
    public function DividasController(){}

    public function salvar(){
        $model = new DividasModel();
        $vo = new DividasVO();
        
        /*echo "<br/><b>Cartao id:</b> " . $_POST['slcCartao'];
        echo "<br/><b>Descricao:</b> " . $_POST['txtDescricao'];
        echo "<br/><b>Orgao:</b> " . $_POST['txtOrgaoDevedor'];
        echo "<br/><b>Parcela:</b> " . $_POST['txtValorParcela'];
        echo "<br/><b>Total:</b> " . $_POST['txtValorTotal'];
        echo "<br/><b>Numero de Parcelas:</b> " . $_POST['txtNumeroParcelas'];
        echo "<br/><b>Data inicial:</b> " . $_POST['txtDataInicial'];
        echo "<br/><b>Data Vencimento:</b> " . $_POST['txtDiaVencimento'];
        echo "<br/><b>Multa Atraso:</b> " . $_POST['txtMultaAtraso'];
        echo "<br/><b>Juros Diario:</b> " . $_POST['txtJurosDiario'];
        echo "<br/><b>Desconto Diario:</b> " . $_POST['txtDescontoDiario'];
        echo "<br/><b>Usuario:</b> " . $_SESSION['user'];*/

        $vo->setCartoes_id($_POST['slcCartao']);
        $vo->setDescricao($_POST['txtDescricao']);
        $vo->setOrgao_devedor($_POST['txtOrgaoDevedor']);
        $vo->setValor_parcela($_POST['txtValorParcela']);
        $vo->setValor_total($_POST['txtValorTotal']);
        $vo->setNumero_parcelas($_POST['txtNumeroParcelas']);
        $vo->setData_inicial($_POST['txtDataInicial']);
        $vo->setDia_mes_vencimento($_POST['txtDiaVencimento']);
        $vo->setMulta_atraso($_POST['txtMultaAtraso']);
        $vo->setJuros_por_dia_atraso($_POST['txtJurosDiario']);
        $vo->setDesconto_por_dia_Adiantado($_POST['txtDescontoDiario']);
        $vo->setUser_update($_SESSION['user']);

        if($model->insertModel($vo)){
            $_SESSION['msg'] = "Divida cadastrado com sucesso!";
        }
        else{
            $_SESSION['msg'] = "Erro ao cadastrar a divida";
        }

        include("view/dividas/dividas.php");
    }

    public function atualizar(){
        $model = new DividasModel();
        $vo = new DividasVO();

        $vo->setId_minha_dividas($_POST['txtIdMinhaDividas']);
        $vo->setCartoes_id($_POST['slcCartao']);
        $vo->setDescricao($_POST['txtDescricao']);
        $vo->setOrgao_devedor($_POST['txtOrgaoDevedor']);   
        $vo->setValor_parcela($_POST['txtValorParcela']);
        $vo->setValor_total($_POST['txtValorTotal']);
        $vo->setValor_parcela($_POST['txtNumeroParcelas']);
        $vo->setData_inicial($_POST['txtDataInicial']);
        $vo->setDia_mes_vencimento($_POST['txtDiaVencimento']);
        $vo->setMulta_atraso($_POST['txtMultaAtraso']);
        $vo->setJuros_por_dia_atraso($_POST['txtJurosDiario']);
        $vo->setDesconto_por_dia_Adiantado($_POST['txtDescontoDiario']);
        $vo->setUser_update($_SESSION['user']);

        if($model->updateModel($vo)){
            $_SESSION['msg'] = "Divida cadastrado com sucesso!";
        }
        else{
            $_SESSION['msg'] = "Erro ao cadastrar a divida";
        }
        include("view/dividas/dividas.php");
    }

    public function novo(){
        include("view/dividas/cadastro_dividas.php");
    }

    public function editar(){
        $model = new DividasModel();
        $vo = $model->getByIdModel($_GET['id_minha_dividas']);

        $_SESSION['cartoes_id'] = $vo->getCartoes_id();
        $_SESSION['descricao'] = $vo->getDescricao();
        $_SESSION['orgao_devedor'] = $vo->getOrgao_devedor();
        $_SESSION['valor_parcela'] = $vo->getValor_parcela();
        $_SESSION['valor_total'] = $vo->getValor_total();
        $_SESSION['numero_parcelas'] = $vo->getNumero_parcelas();
        $_SESSION['data_inicial'] = $vo->getData_inicial();
        $_SESSION['dia_mes_vencimento'] = $vo->getDia_mes_vencimento();
        $_SESSION['multa_atraso'] = $vo->getMulta_atraso();
        $_SESSION['juros_por_dia_atraso'] = $vo->getJuros_por_dia_atraso();
        $_SESSION['desconto_por_dia_adiantado'] = $vo->getDesconto_por_dia_Adiantado();
        $_SESSION['datetime_create'] = $vo->getDatetime_create();
        $_SESSION['user_update'] = $vo->getUser_update();
        $_SESSSION['last_update'] = $vo->getLast_update();

        include("view/dividas/editar_dividas.php");

    }

    public function deletar(){
        $model = new DividasModel();
        $vo = $model->getByIdModel($_GET['id_minha_dividas']);

        if($model->deleteModel($vo)){
            $_SESSION['msg'] = "Divida n.".$vo->getId_minha_dividas()." - (".$vo->getDescricao().") deletado com sucesso!";
        }
        else{
            $_SESSION['msg'] = "Não foi possível deletar a Divida n.".$vo->getId_minha_dividas()." - (".$vo->getDescricao()."). Tente novamente!";
        }
        header("Location :?Controller=Dividas&Action=listar");
    }

    public function pesquisar(){
        $model = new DividasModel();
        $_SESSION['data'] = $model->searchModel($_GET['word']);
        include ("view/dividas/dividas.php");
    }

    public function listar(){
        $model = new DividasModel();
        $_SESSION['data'] = $model->getAllModel();
        include ("view/dividas/dividas.php");
    }
}
?>