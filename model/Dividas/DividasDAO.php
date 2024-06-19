<?php
include "iDividasDAO.php";
class DividasDAO implements iDividasDAO{

    public function insert(DividasVO $value){
        $query = "INSERT INTO 
                    `controlefinanceiro`.`dividas`
                        (`cartoes_id`,
                          `descricao`,
                           `orgao_devedor`,
                            `valor_parcela`,
                             `valor_total`,
                              `numero_parcelas`,
                               `data_inicial`,
                                `dia_mes_vencimento`,
                                 `multa_atraso`,
                                  `juros_por_dia_atraso`,
                                   `desconto_por_dia_adiantado`,
                                    `user_update`)
                     VALUES
                      (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $cartoes_id = $value->getCartoes_id();
        $descricao = $value->getDescricao();
        $orgao_devedor = $value->getOrgao_devedor();
        $valor_parcela = $value->getValor_parcela();
        $valor_total = $value->getValor_total();
        $numero_parcelas = $value->getNumero_parcelas();
        $data_inicial = $value->getData_inicial();
        $dia_mes_vencimento = $value->getDia_mes_vencimento();
        $multa_atraso = $value->getMulta_atraso();
        $juros_por_dia_atraso = $value->getJuros_por_dia_atraso();
        $desconto_por_dia_adiantado = $value->getDesconto_por_dia_Adiantado();
        $user_update = $value->getUser_update();

        $conn = new Connect();
        $conn->getConnection();

        $pstm = $conn->execSql($query);
        $pstm->bind_param("issssissssss", $cartoes_id, $descricao, $orgao_devedor, $valor_parcela, $valor_total, $numero_parcelas, $data_inicial, $dia_mes_vencimento, $multa_atraso, $juros_por_dia_atraso, $desconto_por_dia_adiantado, $user_update);
        if($pstm->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function update(DividasVO $value){
        $query = "UPDATE `dividas` SET cartoes_id = ?, descricao = ?, orgao_devedor = ?, valor_parcela = ?, valor_total = ?, numero_parcelas = ?, data_inicial = ?, dia_mes_vencimento = ?, multa_atraso = ?, juros_por_dia_atraso = ?, desconto_por_dia_adiantado = ?, user_update = ? WHERE id_minhas_dividas = ?;";

        $cartoes_id = $value->getCartoes_id();
        $descricao = $value->getDescricao();
        $orgao_devedor = $value->getOrgao_devedor();
        $valor_parcela = $value->getValor_parcela();
        $valor_total = $value->getValor_parcela();
        $numero_parcelas = $value->getNumero_parcelas();
        $data_inicial = $value->getData_inicial();
        $dia_mes_vencimento = $value->getDia_mes_vencimento();
        $multa_atraso = $value->getMulta_atraso();
        $juros_por_dia_atraso = $value->getJuros_por_dia_atraso();
        $desconto_por_dia_adiantado = $value->getDesconto_por_dia_Adiantado();
        $user_update = $value->getUser_update();
        $id_minhas_dividas = $value->getId_minha_dividas();

        $conn = new Connect();
        $conn->getConnection();

        $pstm = $conn->execSql($query);
        $pstm->bind_param("issssissssssi", $cartoes_id, $descricao, $orgao_devedor, $valor_parcela, $valor_total, $numero_parcelas, $data_inicial, $dia_mes_vencimento, $multa_atraso, $juros_por_dia_atraso, $desconto_por_dia_adiantado, $user_update, $id_minhas_dividas);

        if($pstm->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function delete(DividasVO $value){
        $query  = "DELETE FROM `dividas` WHERE `id_minhas_dividas` = ?";

        $id_minhas_dividas = $value->getId_minha_dividas();

        $conn = new Connect();
        $conn->getConnection();

        $pstm = $conn->execSql($query);
        $pstm->bind_param("i", $id_minhas_dividas);

        if($pstm->execute()){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function getById($id){
        $query = "SELECT * FROM `dividas` WHERE `id_minhas_dividas` = " . addslashes($id);

        $conn = new Connect();
        $conn->getConnection();
        $query = $conn->execReader($query);

        $vo = new DividasVO();

        $rs = $query->fetch_array(MYSQLI_ASSOC);
        $vo->setId_minha_dividas($rs["id_minhas_dividas"]);
        $vo->setCartoes_id($rs["cartoes_id"]);
        $vo->setDescricao($rs["desricao"]);
        $vo->getOrgao_devedor($rs["orgao_devedor"]);
        $vo->setValor_parcela($rs["valor_parcela"]);
        $vo->setValor_total($rs["valor_total"]);
        $vo->setNumero_parcelas($rs["numero_parcelas"]);
        $vo->setData_inicial($rs["data_inicial"]);
        $vo->setDia_mes_vencimento($rs["dia_mes_vencimento"]);
        $vo->setMulta_atraso($rs["multa_atraso"]);
        $vo->setJuros_por_dia_atraso($rs["juros_por_dia_atraso"]);
        $vo->setUser_update($rs["user_update"]);
        $vo->setDatetime_create($rs["datetime_create"]);
        $vo->setLast_update($rs["last_update"]);

        return $vo;

    }
    public function search($word)
    {
        $query = "SELECT * FROM `dividas` WHERE `descricao` like '%?%';";
        
        $conn = new Connect();
        $conn->getConnection();

        $pstm = $conn->execReader($query);
        $pstm->bind_param("s", $word);

        $array = array();
        while($rs = $pstm->fetch_array()){
            $array[] = array($rs["id_minhas_dividas"], $rs["cartoes_id"], $rs["descricao"], $rs["orgao_devedor"], "R$ ".number_format($rs["valor_parcela"], 2, ',', '.'), "R$ ".number_format($rs["valor_total"], 2, ',', '.'), $rs["numero_parcelas"], $rs["data_inicial"], $rs["dia_mes_vencimento"], $rs["multa_atraso"]."%", $rs["juros_por_dia_atraso"]."%", $rs["desconto_por_dia_adiantado"]."%", $rs["user_update"], $rs["datetime_create"], $rs["last_update"]);
        }
        return $array;
    }

    public function getAll(){
        $conn = new Connect();
        $conn->getConnection();
        $query = $conn->execReader("SELECT * FROM `dividas`;");
        $array = array();
        while($rs = $query->fetch_array()){
            $array[] = array($rs["id_minhas_dividas"], $rs["cartoes_id"], $rs["descricao"], $rs["orgao_devedor"], "R$ ".number_format($rs["valor_parcela"], 2, ',', '.'), "R$ ".number_format($rs["valor_total"], 2, ',', '.'), $rs["numero_parcelas"], $rs["data_inicial"], $rs["dia_mes_vencimento"], $rs["multa_atraso"]."%", $rs["juros_por_dia_atraso"]."%", $rs["desconto_por_dia_adiantado"]."%", $rs["user_update"], $rs["datetime_create"], $rs["last_update"]);
        }
        return $array;
    }
}
?>