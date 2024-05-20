<?php
class Despesas_FixasModel{
    public function insertModel(Despesas_FixasVO $value){
        $value->setVencimento((new DateTime($value->getVencimento()))->format('Y-m-d'));
        $value->setValor(str_replace(',', '.', str_replace("R$ ", "", $value->getValor())));

        $dao = new Despesas_FixasDAO();
        return $dao->insert($value);
    }

    public function updateModel(Despesas_FixasVO $value){
        $value->setVencimento((new DateTime($value->getVencimento()))->format('Y-m-d'));
        $value->setValor(str_replace(',', '.', str_replace("R$ ", "", $value->getValor())));

        $dao = new Despesas_FixasDAO();
        return $dao->update($value);
    }

    public function deleteModel(Despesas_FixasVO $value){
        $dao = new Despesas_FixasDAO();
        return $dao->delete($value);
    }

    public function getByIdModel($id_despesas_fixas){
        $dao = new Despesas_FixasDAO();
        $prodDao = $dao->getById($id_despesas_fixas);

        $prodDao->setVencimento((new DateTime($prodDao->getVencimento()))->format('d'));
        $prodDao->setValor("R$ " . str_replace('.', ',', $prodDao->getValor()));
        $prodDao->setLast_update((new DateTime($prodDao->getLast_update()))->format('d/m/Y H:i:s'));

        return $prodDao;
    }

    public function getAllModel($codigo_grupo_usuarios, $mes_id = 0, $ano = 0){
        $dao = new Despesas_FixasDAO();
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