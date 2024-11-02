<?php
include "iDespesas_FixasDAO.php";
class Despesas_FixasDAO implements iDespesas_FixasDAO{
    
    public function insert(Despesas_FixasVO $value){
       $query = "INSERT INTO
                     `despesas_fixas`
                      (`codigo_grupo_usuarios`,
                       `categoria_despesas_fixas_id`,
                        `mes_id_cadastrado`,
                         `ano`,
                          `descricao`,
                           `data_cadastro`,
                            `valor`,
                              `user_update`)
                    VALUES
                    (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $codigo_grupo_usuarios = $value->getCodigo_grupo_usuarios();
        $categoria_despesas_fixas_id = $value->getCategoria_despesas_fixas_id();
        $mes_id = $value->getMes_id();
        $ano = $value->getAno();
        $descricao = $value->getDescricao();
        $vencimento = $value->getVencimento();
        $valor = $value->getValor();
        $status = $value->getStatus();
        $user_update = $value->getUser_update();

        $conn = new Connect();
        $conn->getConnection();

        $pstm = $conn->execSql($query);
        $pstm->bind_param("iiiisssss", $codigo_grupo_usuarios, $categoria_despesas_fixas_id, $mes_id, $ano, $descricao, $vencimento, $valor, $status, $user_update);
        if($pstm->execute()){
            $ultID = $pstm->insert_id;
            $diaVenc = date_format(date_create($vencimento),"d");
            $query = "INSERT INTO `controlefinanceiro`.`vencimentos_despesas_fixas` (`minhas_depesas_fixas_id`, `dia_mes_vencimento`) VALUES (?, ?);";
            $pstm = $conn->execSql($query);
            $pstm->bind_param("ii",$ultID, $diaVenc);
            if($pstm->execute())
                return true;
            else
                return false;
        }  
        else{
           return false; 
        }
    }

    public function update(Despesas_FixasVO $value){
        $query = "UPDATE `despesas_fixas`
                     SET `categoria_despesas_fixas_id` = ?,
                         `mes_id` = ?,
                         `ano` = ?,
                         `descricao` = ?,
                         `data_cadastro` = ?,
                         `valor` = ?,
                         `status` = ?,
                         `user_update` = ?
                     WHERE
                        `id_despesas_fixas` = ?";

        $categoria_despesas_fixas_id = $value->getCategoria_despesas_fixas_id();
        $mes_id = $value->getMes_id();
        $ano = $value->getAno();
        $descricao = $value->getDescricao();
        $vencimento = $value->getVencimento();
        $valor = $value->getValor();
        $status = $value->getStatus();
        $user_update = $value->getUser_update();
        $id_despesa_fixa = $value->getId_despesa_fixa();

        $conn = new Connect();
        $conn->getConnection();

        $pstm = $conn->execSql($query);
        $pstm->bind_param("iiisssssi", $categoria_despesas_fixas_id, $mes_id, $ano, $descricao, $vencimento, $valor, $status, $user_update, $id_despesa_fixa);
        
        if($pstm->execute())
            return true;
        else
            return false;
    }

    public function delete(Despesas_FixasVO $value){
        $query = "DELETE FROM `despesas_fixas` WHERE `id_despesa_fixa` = ?";

        $id_despesa_fixa = $value->getId_despesa_fixa();

        $conn = new Connect();
        $conn->getConnection();

        $pstm = $conn->execSql($query);
        $pstm->bind_param("i", $id_despesa_fixa);

        if($pstm->execute())
            return true;
        else
            return false;
    }

    public function search($codigo_grupo_usuarios, $word)
    {
        $query = "SELECT 
                        *
                    FROM
                        `despesas_fixas`
                    WHERE
                        `codigo_grupo_usuarios` = ?
                            AND `descricao` like '%?%';";

        $conn = new Connect();
        $conn->getConnection();
        $pstm = $conn->execReader($query);
        $pstm->bind_param("is", $codigo_grupo_usuarios, $word);

        $array = array();
        while($rs = $pstm->fetch_object()){
            $array[] = array($rs->id_despesa_fixa, $rs->descricao, $rs->categoria, (new DateTime($rs->data_cadastro))->format('d'), "R$ ".number_format($rs->valor, 2, ',', '.'), $rs->status, $rs->user_update, (new DateTime($rs->last_update))->format('d/m/Y H:i:s'));
        }
        return $array;
    }

    public function getRegister($codigo_grupo_usuarios)
    {
        $query = "SELECT
                        `df`.`id_despesa_fixa`,
                        `df`.`descricao`,
                        `df`.`categoria_despesas_fixas_id`,
                        `c`.`categoria`,
                        `df`.`data_cadastro`,
                        `df`.`valor`,
                        `df`.`status`,
                        `df`.`user_update`,
                        `df`.`last_update`
                    FROM
                        `despesas_fixas` AS `df`
                            INNER JOIN
                        `categorias` AS `c` ON `df`.`categoria_despesas_fixas_id` = `c`.`id_categoria`
                    WHERE
                        `df`.`codigo_grupo_usuarios` = ?
                            AND `df`.`data_cadastro` >= SUBDATE(CURDATE(), 1);";
        
        $conn = new Connect();
        $conn->getConnection();
        $pstm = $conn->execReader($query);
        $pstm->bind_param("i", $codigo_grupo_usuarios);

        $array = array();
        while($rs = $pstm->fetch_object()){
            $array[] = array($rs->id_despesas_fixa, $rs->descricao, $rs->categoria, (new DateTime($rs->data_cadastro))->format('d'), "R$ ".number_format($rs->valor, 2, ',', '.'), $rs->status, $rs->user_update, (new DateTime($rs->last_update))->format('d/m/Y H:i:s'));
        }
        return $array;
    }



    public function getById($id_despesa_fixa)
    {
        $query = "SELECT
                        `df`.`id_despesa_fixa`,
                        `df`.`descricao`,
                        `df`.`categoria_despesas_fixas_id`,
                        `c`.`categoria`,
                        `df`.`data_cadastro`,
                        `df`.`valor`,
                        `df`.`status`,
                        `df`.`user_update`,
                        `df`.`last_update`
                    FROM
                        `despesas_fixas` AS `df`
                            INNER JOIN
                        `categorias` AS `c` ON `df`.`categoria_despesas_fixas_id` = `c`.`id_categoria`
                    WHERE
                        `df`.`id_despesas_fixas` = " . addslashes($id_despesa_fixa);
        $conn = new Connect();
        $conn->getConnection();
        $result = $conn->execReader($query);

        $vo = new Despesas_FixasVO();
        $result->fetch_object($query);
        //while($rs = $result->fetch_object(MYSQLI_ASSOC)){
        //$rs = $result->fetch_object(MYSQLI_ASSOC);
        $rs = $result->fetch_object();

        $vo->setId_despesa_fixa($rs->id_despesa_fixa);
        $vo->setDescricao($rs->descricao);
        $vo->setCategoria_despesas_fixas_id($rs->categoria_despesas_fixas_id);
        $vo->setCategoria($rs->categoria);
        $vo->setVencimento($rs->vencimento);
        $vo->setValor($rs->valor);
        $vo->setStatus($rs->status);
        $vo->setUser_update($rs->user_update);
        $vo->setLast_update($rs->last_update);

        return $vo;
    }

    public function getAll($codigo_grupo_usuarios, $mes_id, $ano)
    {
        $query = "SELECT 
                    `df`.`id_despesa_fixa`,
                    `df`.`descricao`,
                    `c`.`categoria`,
                    `df`.`data_cadastro`,
                    `df`.`valor`,
                    CASE
                        WHEN
                            (SELECT 
                                    COUNT(*)
                                FROM
                                    `pagamento_despesas_fixas`
                                WHERE
                                    `despesa_fixa_id` = `df`.`id_despesa_fixa`
                                        AND `mes_id` = $mes_id
                                        AND `ano` = $ano) > 0
                        THEN
                            '<i style=\"color:green;\">Paga</i>'
                        ELSE '<u style=\"color:red;\">A pagar</u>'
                    END AS 'status',
                    `df`.`user_update`,
                    `df`.`last_update`
                FROM
                    `despesas_fixas` AS `df`
                        INNER JOIN
                    `categorias` AS `c` ON `df`.`categoria_despesas_fixas_id` = `c`.`id_categoria`
                WHERE
                    `df`.`data_cadastro` <= DATE(CONCAT($ano, '-', $mes_id, '-', 31))
                        AND `df`.`active` = 'Y'
                        AND `df`.`codigo_grupo_usuarios` = " . addslashes($codigo_grupo_usuarios);

        $conn = new Connect();
        $conn->getConnection();
        $result = $conn->execReader($query);
        
        $array = array();
        while($rs = $result->fetch_object()){
            $array[] = array($rs->id_despesa_fixa, $rs->descricao, $rs->categoria, (new DateTime($rs->data_cadastro))->format('d'), "R$ ".number_format($rs->valor, 2, ',', '.'), $rs->status, $rs->user_update, (new DateTime($rs->last_update))->format('d/m/Y H:i:s'));
        }
        return $array;
    }
}
?>