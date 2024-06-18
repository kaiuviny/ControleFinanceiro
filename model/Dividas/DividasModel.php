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
        $divDAO = $dao->getById($id);
        return $divDAO;
    }

    public function getAllModel(){
        $dao = new DividasDAO();
        return $dao->getAll();
    }
}
?>