<?php
class Despesas_VariaveisModel{
    public function insertModel(Despesas_VariaveisVO $value){
        $dao = new Despesas_VariaveisDAO();
        return $dao->insert($value);
    }

    public function updateModel(Despesas_VariaveisVO $value){
        $dao = new Despesas_VariaveisDAO();
        return $dao->update($value);
    }

    public function deleteModel(Despesas_VariaveisVO $value){
        $dao = new Despesas_VariaveisDAO();
        return $dao->delete($value);
    }

    public function searchModel($codigo_grupo_usuarios, $word){
        $dao = new Despesas_VariaveisDAO();
        return $dao->search($codigo_grupo_usuarios, $word);
    }

    public function getRegisterModel($codigo_grupo_usuarios){
        $dao = new Despesas_VariaveisDAO();
        return $dao->getRegister($codigo_grupo_usuarios);
    }

    public function getByIdModel($id_despesa_variavel){
        $dao = new Despesas_FixasDAO();
        return $dao->getById($id_despesa_variavel);
    }

    public function getAllModel($codigo_grupo_usuarios, $mes_id = 0, $ano = 0){
       $dao = new Despesas_VariaveisDAO();
       if(empty($mes_id)){
        $mes_id = date("m");
        $_SESSION['mes_id'] = $mes_id;
       }
       if(empty($ano)){
        $ano = date("Y");
        $_SESSION['ano'] = $ano;
       }
       return $dao->getAll($codigo_grupo_usuarios, $mes_id, $ano);
    }
}
?>