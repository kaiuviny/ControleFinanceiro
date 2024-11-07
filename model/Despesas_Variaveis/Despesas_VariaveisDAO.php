<?php
include "iDespesas_VariaveisDAO.php";
class Despesas_VariaveisDAO implements iDespesas_VariaveisDAO{

    public function insert(Despesas_VariaveisVO $value){
        $query = "INSERT INTO
                  `despesas_variaveis`
                   (`mes_id`,
                     `ano`,
                      `categoria_despesas_variaveis_id`,
                       `codigo_grupo_usuarios`,
                        `estabelecimento_id`,
                         `tipo_estabelecimento_id`,
                          `observacao_estabelecimento`,
                           `descricao`,
                            `valor`,
                             `data_utilizada`,
                              `user_update`)
                   VALUES
                    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        
        $mes_id                             = $value->getMes_id();
        $ano                                = $value->getAno();
        $categoria_despesas_variaveis_id    = $value->getCategoria_despesas_variaveis_id();
        $codigo_grupo_usuarios              = $value->getCodigo_grupo_usuarios();
        $estabelecimento_id                 = $value->getEstabelecimento_id();
        $tipo_estabelecimento_id            = $value->getTipo_estabelecimento_id();
        $observacao_estabelecimento         = $value->getObservacao_estabalecimento();
        $descricao                          = $value->getDescricao();
        $valor                              = $value->getValor();
        $data_utilizada                     = $value->getData_utilizada();
        $user_update                        = $value->getUser_update();

        $conn = new Connect();
        $conn->getConnection();

        $pstm = $conn->execSql($query);
        $pstm->bind_param("iiiiiisssss", $mes_id, $ano, $categoria_despesas_variaveis_id, $codigo_grupo_usuarios, $estabelecimento_id, $tipo_estabelecimento_id, $observacao_estabelecimento, $descricao, $valor, $data_utilizada, $user_update);
        if($pstm->execute()){
            $ultID = $pstm->insert_id;
            $forma_pagamento_id = $value->getForma_pagamento_id();
            $cartao_id = $value->getCartao_id();
            $query = "INSERT INTO `controlefinanceiro`.`pagamento_despesas_variaveis` (`despesa_variavel_id`, `forma_pagamento_id`, `cartao_id`, `valor_pago`, `user_update`) VALUES (?, ?, ?, ?, ?, ?);";
            $pstm = $conn->execSql($query);
            $pstm->bind_param("iiiss", $ultID, $forma_pagamento_id, $cartao_id, $valor, $user_update);
            if($pstm->execute())
                return true;
            else
                return false;
        }
        else{
            return false;
        } 
    }

    public function update(Despesas_VariaveisVO $value){
        $query="UPDATE
                     `despesas_variaveis`
                SET
                       `mes_id`=?,
                         `ano`=?,
                          `categoria_despesas_variaveis_id`=?,
                           `estabelecimento_id`=?,
                            `tipo_estabelecimento_id`=?,
                             `observacao_estabelecimento`=?,
                              `descricao`=?,
                               `valor`=?,
                                `data_utilizada`=?,
                                 `user_update`=?
                WHERE
                 `id_despesa_variavel`=?;";

        $mes_id                             = $value->getMes_id();
        $ano                                = $value->getAno();
        $categoria_despesas_variaveis_id    = $value->getCategoria_despesas_variaveis_id();
        $codigo_grupo_usuarios              = $value->getCodigo_grupo_usuarios();
        $estabelecimento_id                 = $value->getEstabelecimento_id();
        $tipo_estabelecimento_id            = $value->getTipo_estabelecimento_id();
        $observacao_estabelecimento         = $value->getObservacao_estabalecimento();
        $descricao                          = $value->getDescricao();
        $valor                              = $value->getValor();
        $data_utilizada                     = $value->getData_utilizada();
        $user_update                        = $value->getUser_update();
        $id_despesa_variavel                = $value->getId_despesa_variavel();

        $conn = new connect();
        $conn->getConnection();

        $pstm = $conn->execSql($query);
        $pstm->bind_param("iiiiisssssi", $mes_id, $ano, $categoria_despesas_variaveis_id, $codigo_grupo_usuarios, $estabelecimento_id, $tipo_estabelecimento_id, $observacao_estabelecimento, $descricao, $valor, $data_utilizada, $user_update, $id_despesa_variavel);
        if($pstm->execute()){
            $ultID = $pstm->insert_id;
            $forma_pagamento_id = $value->getForma_pagamento_id();
            $cartao_id = $value->getCartao_id();
            $query = "UPDATE `pagamento_despesas_variaveis` SET `forma_pagamento_id`=?, `cartao_id`=?, `valor_pago`=?, `data_pagamento`=?, `user_update`=? WHERE `despesa_variavel_id`=?;";
            $pstm = $conn->execSql($query);
            $pstm->bind_param("iisssi", $forma_pagamento_id, $cartao_id, $valor, $data_utilizada, $user_update, $ultID);
            if($pstm->execute())
                return true;
            else
                return false;
        }
        else{
            return false;
        }

    }

    public function delete(Despesas_VariaveisVO $value){
        $query = "DELETE FROM `despesas_variaveis` WHERE `id_despesa_variavel` = ?";

        $id_despesa_variavel = $value->getId_despesa_variavel();

        $conn = new Connect();
        $conn->getConnection();

        $pstm = $conn->execSql($query);
        $pstm->bind_param("i", $id_despesa_variavel);
        if($pstm->execute()){
            $query = "DELETE FROM `pagamento_despesas_variaveis` WHERE `despesa_variavel_id` = ?";
            $pstm = $conn->execSql($query);
            $pstm->bind_param("i", $id_despesa_variavel);
            if($pstm->execute())
                return true;
            else
                return false;
        }
        else{
            return false;
        }

        
    }

    public function search($codigo_grupo_usuarios, $word){
        $query = "SELECT 
                    dv.id_despesa_variavel,
                    dv.mes_id,
                    dv.ano,
                    c.categoria,
                    e.estabelecimento,
                    te.tipo_estabelecimento,
                    dv.observacao_estabelecimento,
                    dv.descricao,
                    dv.valor,
                    dv.data_utilizada,
                    dv.datetime_create,
                    dv.user_update,
                    dv.last_update,
                    fp.tipo as tipo_forma_pagamento,
                    ct.descricao AS descricao_cartao,
                    pdv.valor_pago,
                    pdv.data_pagamento,
                    pdv.user_update AS user_update_pdv,
                    pdv.last_update AS last_update_pdv
                FROM
                    despesas_variaveis AS dv
                        INNER JOIN
                    categorias AS c ON dv.categoria_despesas_variaveis_id = c.id_categoria
                        INNER JOIN
                    estabelecimentos AS e ON dv.estabelecimento_id = e.id_estabelecimento
                        INNER JOIN
                    tipo_estabelecimentos AS te ON dv.tipo_estabelecimento_id = te.id_tipo_estabelecimento
                        INNER JOIN
                    pagamento_despesas_variaveis AS pdv ON dv.id_despesa_variavel = pdv.despesa_variavel_id
                        INNER JOIN
                    formas_pagamento AS fp ON pdv.forma_pagamento_id = fp.id_forma_pagamento
                        INNER JOIN
                    cartoes AS ct ON pdv.cartao_id = ct.id_cartao
                WHERE
                    dv.codigo_grupo_usuarios = ?
                    AND (dv.`descricao` LIKE '%?%' OR dv.`observacao_estabelecimento` LIKE '%?%');";
        $conn = new Connect();
        $conn->getConnection();
        $pstm = $conn->execReader($query);
        $pstm->bind_param("isS", $codigo_grupo_usuarios, $word, $word);

        $array = array();
        while($rs = $pstm->fetch_object()){
            $array[] = array($rs->id_despesa_variavel, $rs->mes_id, $rs->ano, $rs->categoria, $rs->estabelecimento, $rs->tipo_estabelecimento, $rs->observacao_estabelecimento, $rs->descricao, $rs->valor, $rs->data_utilizada, $rs->datetime_create, $rs->user_update, $rs->last_update, $rs->tipo_forma_pagamento, $rs->descricao_cartao, $rs->valor_pago, $rs->data_pagamento, $rs->user_update_pdv, $rs->last_update_pdv);
        }
        return $array;
    }

    public function getRegister($codigo_grupo_usuarios){
        $query = "SELECT 
                    dv.id_despesa_variavel,
                    dv.mes_id,
                    dv.ano,
                    c.categoria,
                    e.estabelecimento,
                    te.tipo_estabelecimento,
                    dv.observacao_estabelecimento,
                    dv.descricao,
                    dv.valor,
                    dv.data_utilizada,
                    dv.datetime_create,
                    dv.user_update,
                    dv.last_update,
                    fp.tipo as tipo_forma_pagamento,
                    ct.descricao AS descricao_cartao,
                    pdv.valor_pago,
                    pdv.data_pagamento,
                    pdv.user_update AS user_update_pdv,
                    pdv.last_update AS last_update_pdv
                FROM
                    despesas_variaveis AS dv
                        INNER JOIN
                    categorias AS c ON dv.categoria_despesas_variaveis_id = c.id_categoria
                        INNER JOIN
                    estabelecimentos AS e ON dv.estabelecimento_id = e.id_estabelecimento
                        INNER JOIN
                    tipo_estabelecimentos AS te ON dv.tipo_estabelecimento_id = te.id_tipo_estabelecimento
                        INNER JOIN
                    pagamento_despesas_variaveis AS pdv ON dv.id_despesa_variavel = pdv.despesa_variavel_id
                        INNER JOIN
                    formas_pagamento AS fp ON pdv.forma_pagamento_id = fp.id_forma_pagamento
                        INNER JOIN
                    cartoes AS ct ON pdv.cartao_id = ct.id_cartao
                WHERE
                    dv.codigo_grupo_usuarios = ?
                    AND 
                    dv.data_utilizada >= SUBDATE(CURDATE(), 1);";
        $conn = new Connect();
        $conn->getConnection();
        $pstm = $conn->execReader($query);
        $pstm->bind_param("i", $codigo_grupo_usuarios);

        $array = array();
        while($rs = $pstm->fetch_object()){
            $array[] = array($rs->id_despesa_variavel, $rs->mes_id, $rs->ano, $rs->categoria, $rs->estabelecimento, $rs->tipo_estabelecimento, $rs->observacao_estabelecimento, $rs->descricao, $rs->valor, $rs->data_utilizada, $rs->datetime_create, $rs->user_update, $rs->last_update, $rs->tipo_forma_pagamento, $rs->descricao_cartao, $rs->valor_pago, $rs->data_pagamento, $rs->user_update_pdv, $rs->last_update_pdv);
        }
        return $array;
    }

    public function getById($id_despesa_variavel){
        $query = "SELECT 
                    dv.id_despesa_variavel,
                    dv.mes_id,
                    dv.ano,
                    dv.categoria_despesas_variaveis_id,
                    dv.estabelecimento_id,
                    dv.tipo_estabelecimento_id,
                    dv.observacao_estabelecimento,
                    dv.descricao,
                    dv.valor,
                    dv.data_utilizada,
                    dv.datetime_create,
                    dv.user_update,
                    dv.last_update,
                    pdv.forma_pagamento_id,
                    pdv.cartao_id,
                    pdv.valor_pago,
                    pdv.data_pagamento,
                    pdv.user_update AS user_update_pdv,
                    pdv.last_update AS last_update_pdv
                FROM
                    despesas_variaveis AS dv
                        INNER JOIN
                    pagamento_despesas_variaveis AS pdv ON dv.id_despesa_variavel = pdv.despesa_variavel_id
                WHERE
                    dv.id_despesa_variavel = ".addslashes($id_despesa_variavel);
        
        $conn = new Connect();
        $conn->getConnection();
        $result = $conn->execReader($query);

        $vo = new Despesas_VariaveisVO();
        
        $rs = $result->fetch_object();

        $vo->setId_despesa_variavel($rs->id_despesa_variavel);
        $vo->setMes_id($rs->mes_id);
        $vo->setAno($rs->ano);
        $vo->setCategoria_despesas_variaveis_id($rs->categoria_despesas_variaveis_id);
        $vo->setCodigo_grupo_usuarios($rs->codigo_grupo_usuarios);
        $vo->setEstabelecimento_id($rs->estabelecimento_id);
        $vo->setTipo_estabelecimento_id($rs->tipo_estabelecimento_id);
        $vo->setObservacao_estabalecimento($rs->observacao_estabelecimento);
        $vo->setDescricao($rs->descricao);
        $vo->setValor($rs->valor);
        $vo->setData_utilizada($rs->data_utilizada);
        $vo->setDatetime_create($rs->datetime_create);
        $vo->setUser_update($rs->user_update);
        $vo->setLast_update($rs->last_update);
        $vo->setForma_pagamento_id($rs->forma_pagamento_id);
        $vo->setCartao_id($rs->cartao_id);
        $vo->getValor_pago($rs->valor_pago);
        $vo->getData_pagamento($rs->data_pagamento);
        $vo->getUser_update_pdv($rs->user_update_pdv);
        $vo->getLast_update_pdv($rs->last_update_pdv);

        return $vo;
    }   

    public function getAll($codigo_grupo_usuarios, $mes_id, $ano){
        $query = "SELECT 
                    dv.id_despesa_variavel,
                    dv.mes_id,
                    dv.ano,
                    c.categoria,
                    e.estabelecimento,
                    te.tipo_estabelecimento,
                    dv.observacao_estabelecimento,
                    dv.descricao,
                    dv.valor,
                    dv.data_utilizada,
                    dv.datetime_create,
                    dv.user_update,
                    dv.last_update,
                    fp.tipo as tipo_forma_pagamento,
                    ct.descricao AS descricao_cartao,
                    pdv.valor_pago,
                    pdv.data_pagamento,
                    pdv.user_update AS user_update_pdv,
                    pdv.last_update AS last_update_pdv
                FROM
                    despesas_variaveis AS dv
                        INNER JOIN
                    categorias AS c ON dv.categoria_despesas_variaveis_id = c.id_categoria
                        INNER JOIN
                    estabelecimentos AS e ON dv.estabelecimento_id = e.id_estabelecimento
                        INNER JOIN
                    tipo_estabelecimentos AS te ON dv.tipo_estabelecimento_id = te.id_tipo_estabelecimento
                        INNER JOIN
                    pagamento_despesas_variaveis AS pdv ON dv.id_despesa_variavel = pdv.despesa_variavel_id
                        INNER JOIN
                    formas_pagamento AS fp ON pdv.forma_pagamento_id = fp.id_forma_pagamento
                        INNER JOIN
                    cartoes AS ct ON pdv.cartao_id = ct.id_cartao
                WHERE
                    dv.codigo_grupo_usuarios = ?
                    AND dv.mes_id =?
                    AND dv.ano = ?;";

        $conn = new Connect();
        $conn->getConnection();
        $pstm = $conn->execReader($query);
        $pstm->bind_param("iii", $codigo_grupo_usuarios, $mes_id, $ano);

        $array = array();
        while($rs = $pstm->fetch_object()){
            $array[] = array($rs->id_despesa_variavel, $rs->mes_id, $rs->ano, $rs->categoria, $rs->estabelecimento, $rs->tipo_estabelecimento, $rs->observacao_estabelecimento, $rs->descricao, "R$ ".number_format($rs->valor, 2, ',', '.'), (new DateTime($rs->data_utilizada))->format('d/m/Y'), (new DateTime($rs->datetime_create))->format('d/m/Y H:i:s'), $rs->user_update, (new DateTime($rs->last_update))->format('d/m/Y'), $rs->tipo_forma_pagamento, $rs->descricao_cartao, "R$ ".number_format($rs->valor_pago, 2, ',', '.'), (new DateTime($rs->data_pagamento))->format('d/m/Y'), $rs->user_update_pdv, (new DateTime($rs->last_update_pdv))->format('d/m/Y H:i:s'));
        }
        return $array;
    }
}
?>