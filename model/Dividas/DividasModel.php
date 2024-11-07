<?php
class DividasModel{

    public function insertModel(DividasVO $value){
        $dao = new DividasDAO();
        return $dao->insert($value);
    }

    public function deleteModel(DividasVO $value){
        $dao = new DividasDAO();
        return $dao->delete($value);
    }

    public function updateModel(DividasVO $value){
        $dao = new DividasDAO();
        return $dao->update($value);
    }

    public function getByIdModel($id){
        $dao = new DividasDAO();
        return $dao->getById($id);
    }

    public function searchModel($word, $codigo_grupo_usuarios, $mes_id, $ano){
        $dao = new DividasDAO();
        if (empty($mes_id)){
            $mes_id = date("m");
            $_SESSION['mes_id'] = $mes_id;
        }
        if(empty($ano)){
            $ano = date("Y");
            $_SESSION['ano'] = $ano;
        }
        return $dao->search($word, $codigo_grupo_usuarios, $mes_id, $ano);
    }

    public function getAllModel($codigo_grupo_usuarios, $mes_id, $ano){
        $dao = new DividasDAO();
        if (empty($mes_id)){
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