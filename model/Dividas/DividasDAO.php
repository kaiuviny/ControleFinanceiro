<?php
include "iDividasDAO.php";
class DividasDAO implements iDividasDAO{

    public function insert(DividasVO $value){
        $query = "INSERT INTO 
                    `controlefinanceiro`.`dividas`
                        (`tipo_divida_id`,
                          `cartao_id`,
                           `codigo_grupo_usuarios`,
                            `descricao`,
                             `orgao_devedor`,
                              `site`,
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
                      (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $tipo_divida_id = $value->getTipo_divida_id();
        $cartao_id = $value->getCartao_id();
        $codigo_grupo_usuarios = $value->getCodigo_grupo_usuarios();
        $descricao = $value->getDescricao();
        $orgao_devedor = $value->getOrgao_devedor();
        $site = $value->getSite();
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
        $pstm->bind_param("iiisssssissssss", $tipo_divida_id, $cartao_id, $codigo_grupo_usuarios, $descricao, $orgao_devedor, $site, $valor_parcela, $valor_total, $numero_parcelas, $data_inicial, $dia_mes_vencimento, $multa_atraso, $juros_por_dia_atraso, $desconto_por_dia_adiantado, $user_update);
        if($pstm->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function update(DividasVO $value){
        $query = "UPDATE `dividas`
                    SET `tipo_divida_id` = ?
                         `cartao_id` = ?,
                          `codigo_grupo_usuarios` = ?
                           `descricao` = ?,
                            `orgao_devedor` = ?,
                             `site` = ?,
                              `valor_parcela` = ?,
                               `numero_parcelas` = ?,
                                `valor_total` = ?,
                                 `data_inicial` = ?,
                                  `dia_mes_vencimento` = ?,
                                   `multa_atraso` = ?,
                                    `juros_por_dia_atraso` = ?,
                                     `desconto_por_dia_adiantado` = ?,
                                      `user_update` = ?
                    WHERE `id_minhas_dividas` = ?;";
        $tipo_divida_id = $value->getTipo_divida_id();
        $cartao_id = $value->getCartao_id();
        $codigo_grupo_usuarios = $value->getCodigo_grupo_usuarios();
        $descricao = $value->getDescricao();
        $orgao_devedor = $value->getOrgao_devedor();
        $site = $value->getSite();
        $valor_parcela = $value->getValor_parcela();
        $numero_parcelas = $value->getNumero_parcelas();
        $valor_total = $value->getValor_parcela();
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
        $pstm->bind_param("iiissssississssi", $tipo_divida_id, $cartao_id, $codigo_grupo_usuarios, $descricao, $orgao_devedor, $site, $valor_parcela, $numero_parcelas, $valor_total, $data_inicial, $dia_mes_vencimento, $multa_atraso, $juros_por_dia_atraso, $desconto_por_dia_adiantado, $user_update, $id_minhas_dividas);

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
        $vo->setTipo_divida_id($rs["tipo_divida_id"]);
        $vo->setCartao_id($rs["cartao_id"]);
        $vo->setCodigo_grupo_usuarios($rs["codigo_grupo_usuarios"]);
        $vo->setDescricao($rs["desricao"]);
        $vo->getOrgao_devedor($rs["orgao_devedor"]);
        $vo->getSite($rs["site"]);
        $vo->setValor_parcela($rs["valor_parcela"]);
        $vo->setNumero_parcelas($rs["numero_parcelas"]);
        $vo->setValor_total($rs["valor_total"]);
        $vo->setData_inicial($rs["data_inicial"]);
        $vo->setDia_mes_vencimento($rs["dia_mes_vencimento"]);
        $vo->setMulta_atraso($rs["multa_atraso"]);
        $vo->setJuros_por_dia_atraso($rs["juros_por_dia_atraso"]);
        $vo->setDesconto_por_dia_Adiantado($rs["desconto_por_dia_adiantado"]);
        $vo->setDatetime_create($rs["datetime_create"]);
        $vo->setUser_update($rs["user_update"]);
        $vo->setLast_update($rs["last_update"]);

        return $vo;

    }

    public function search($word, $codigo_grupo_usuarios, $mes_id, $ano){
        $conn = new Connect();
        $conn->getConnection();

        $query = "SELECT
                    d.id_minha_divida,
                    td.tipo,
                    CONCAT(c.descricao,
                            '-',
                            b.nome_abreviado,
                            ' (',
                            p.primeiro_nome,
                            ' ',
                            p.sobre_nome,
                            ')') AS cartao,
                    d.descricao,
                    d.orgao_devedor,
                    CONCAT(\"<a href='\", d.site, \"'>\", d.site, \"</a>\") AS 'site',
                    CONCAT('R$ ',
                            CASE
                                WHEN
                                    LENGTH(REPLACE(d.valor_parcela, '.', ',')) = 7
                                THEN
                                    CONCAT(LEFT(d.valor_parcela, 1),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_parcela, '.', ',') FROM 2))
                                WHEN
                                    LENGTH(REPLACE(d.valor_parcela, '.', ',')) = 8
                                THEN
                                    CONCAT(LEFT(d.valor_parcela, 2),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_parcela, '.', ',') FROM 3))
                                WHEN
                                    LENGTH(REPLACE(d.valor_parcela, '.', ',')) = 9
                                THEN
                                    CONCAT(LEFT(d.valor_parcela, 3),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_parcela, '.', ',') FROM 4))
                                ELSE REPLACE(d.valor_parcela, '.', ',')
                            END) AS valor_parcela,
                    d.numero_parcelas,
                    CONCAT('R$ ',
                            CASE
                                WHEN
                                    LENGTH(REPLACE(d.valor_total, '.', ',')) = 7
                                THEN
                                    CONCAT(LEFT(d.valor_total, 1),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_total, '.', ',') FROM 2))
                                WHEN
                                    LENGTH(REPLACE(d.valor_total, '.', ',')) = 8
                                THEN
                                    CONCAT(LEFT(d.valor_total, 2),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_total, '.', ',') FROM 3))
                                WHEN
                                    LENGTH(REPLACE(d.valor_total, '.', ',')) = 9
                                THEN
                                    CONCAT(LEFT(d.valor_total, 3),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_total, '.', ',') FROM 4))
                                ELSE REPLACE(d.valor_total, '.', ',')
                            END) AS valor_total,
                    CONCAT(RIGHT(d.data_inicial, 2),
                            '/',
                            SUBSTRING(d.data_inicial, 6, 2),
                            '/',
                            LEFT(d.data_inicial, 4)) AS data_inicial,
                    d.dia_mes_vencimento,
                    CONCAT(d.multa_atraso, '%') AS multa_atraso,
                    CONCAT(d.juros_por_dia_atraso, '%') AS juros_por_dia_atraso,
                    CONCAT(d.desconto_por_dia_adiantado, '%') AS desconto_por_dia_adiantado,
                    CONCAT(RIGHT(DATE(d.datetime_create), 2),
                            '/',
                            SUBSTRING(d.datetime_create, 6, 2),
                            '/',
                            LEFT(d.datetime_create, 4), \" \",TIME(d.datetime_create)) AS data_criacao,
                    CASE
                        WHEN
                            (SELECT 
                                    COUNT(*)
                                FROM
                                    `pagamento_dividas`
                                WHERE
                                    `minha_divida_id` = d.id_minha_divida AND `mes_id` = $mes_id
                                        AND `ano` = $ano) > 0
                        THEN
                            '<i style=\"color:green;\">Paga</i>'
                        ELSE '<u style=\"color:red;\">A pagar</u>'
                    END AS 'status_button',
                    d.user_update AS usuario,
                    CONCAT(RIGHT(DATE(d.last_update), 2),
                            '/',
                            SUBSTRING(d.last_update, 6, 2),
                            '/',
                            LEFT(d.last_update, 4), \" \",TIME(d.last_update)) AS ultima_atualizacao,
                CASE
                        WHEN
                            (SELECT 
                                    COUNT(*)
                                FROM
                                    `pagamento_dividas`
                                WHERE
                                    `minha_divida_id` = d.id_minha_divida AND `mes_id` = $mes_id
                                        AND `ano` = $ano) > 0
                        THEN
                            'background-color: lightcyan;'
                        ELSE 'background-color: transparent;'
                    END AS 'collor_table',
                CASE
                        WHEN
                            (SELECT 
                                    COUNT(*)
                                FROM
                                    `pagamento_dividas`
                                WHERE
                                    `minha_divida_id` = d.id_minha_divida AND `mes_id` = $mes_id
                                        AND `ano` = $ano) > 0
                        THEN
                            'Paga'
                        ELSE 'Pagar'
                    END AS 'status',
                CASE
                        WHEN
                            (SELECT 
                                    COUNT(*)
                                FROM
                                    `pagamento_dividas`
                                WHERE
                                    `minha_divida_id` = d.id_minha_divida) > 0
                        THEN
                            (SELECT 
                                    MAX(`numero_parcela_paga`)
                                FROM
                                    `pagamento_dividas`
                                WHERE
                                    `minha_divida_id` = d.id_minha_divida)
                        ELSE '0'
                    END AS 'ultima_parcela_paga'
                FROM
                    dividas AS d
                        INNER JOIN
                    tipo_dividas AS td ON d.tipo_divida_id = td.id_tipo_divida
                        INNER JOIN
                    cartoes AS c ON d.cartao_id = c.id_cartao
                        INNER JOIN
                    pessoas AS p ON c.pessoa_id = p.id_pessoa
                        INNER JOIN
                    bancos AS b ON c.banco_id = b.id_banco
                WHERE
                    d.active = 'Y'
                    AND (d.descricao LIKE '%".$word."%' OR d.orgao_devedor LIKE '%".$word."%')
                        AND d.codigo_grupo_usuarios = " .addslashes($codigo_grupo_usuarios);
        $result = $conn->execReader($query);
        $array = array();
        while($rs = $result->fetch_array()){
            $array[] = array($rs["id_minha_divida"], $rs["tipo"], $rs["cartao"], $rs["descricao"], $rs["orgao_devedor"], $rs["site"], $rs["valor_parcela"], $rs["numero_parcelas"], $rs["valor_total"], $rs["data_inicial"], $rs["dia_mes_vencimento"], $rs["multa_atraso"], $rs["juros_por_dia_atraso"], $rs["desconto_por_dia_adiantado"], $rs["data_criacao"], $rs["usuario"], $rs["ultima_atualizacao"], $rs["status_button"], $rs["collor_table"], $rs["status"], $rs["ultima_parcela_paga"]);
        }
        return $array;
    }

    public function getAll($codigo_grupo_usuarios, $mes_id, $ano){

        $conn = new Connect();
        $conn->getConnection();

        $query = "SELECT
                    d.id_minha_divida,
                    td.tipo,
                    CONCAT(c.descricao,
                            '-',
                            b.nome_abreviado,
                            ' (',
                            p.primeiro_nome,
                            ' ',
                            p.sobre_nome,
                            ')') AS cartao,
                    d.descricao,
                    d.orgao_devedor,
                    CONCAT(\"<a href='\", d.site, \"'>\", d.site, \"</a>\") AS 'site',
                    CONCAT('R$ ',
                            CASE
                                WHEN
                                    LENGTH(REPLACE(d.valor_parcela, '.', ',')) = 7
                                THEN
                                    CONCAT(LEFT(d.valor_parcela, 1),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_parcela, '.', ',') FROM 2))
                                WHEN
                                    LENGTH(REPLACE(d.valor_parcela, '.', ',')) = 8
                                THEN
                                    CONCAT(LEFT(d.valor_parcela, 2),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_parcela, '.', ',') FROM 3))
                                WHEN
                                    LENGTH(REPLACE(d.valor_parcela, '.', ',')) = 9
                                THEN
                                    CONCAT(LEFT(d.valor_parcela, 3),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_parcela, '.', ',') FROM 4))
                                ELSE REPLACE(d.valor_parcela, '.', ',')
                            END) AS valor_parcela,
                    d.numero_parcelas,
                    CONCAT('R$ ',
                            CASE
                                WHEN
                                    LENGTH(REPLACE(d.valor_total, '.', ',')) = 7
                                THEN
                                    CONCAT(LEFT(d.valor_total, 1),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_total, '.', ',') FROM 2))
                                WHEN
                                    LENGTH(REPLACE(d.valor_total, '.', ',')) = 8
                                THEN
                                    CONCAT(LEFT(d.valor_total, 2),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_total, '.', ',') FROM 3))
                                WHEN
                                    LENGTH(REPLACE(d.valor_total, '.', ',')) = 9
                                THEN
                                    CONCAT(LEFT(d.valor_total, 3),
                                            '.',
                                            SUBSTRING(REPLACE(d.valor_total, '.', ',') FROM 4))
                                ELSE REPLACE(d.valor_total, '.', ',')
                            END) AS valor_total,
                    CONCAT(RIGHT(d.data_inicial, 2),
                            '/',
                            SUBSTRING(d.data_inicial, 6, 2),
                            '/',
                            LEFT(d.data_inicial, 4)) AS data_inicial,
                    d.dia_mes_vencimento,
                    CONCAT(d.multa_atraso, '%') AS multa_atraso,
                    CONCAT(d.juros_por_dia_atraso, '%') AS juros_por_dia_atraso,
                    CONCAT(d.desconto_por_dia_adiantado, '%') AS desconto_por_dia_adiantado,
                    CONCAT(RIGHT(DATE(d.datetime_create), 2),
                            '/',
                            SUBSTRING(d.datetime_create, 6, 2),
                            '/',
                            LEFT(d.datetime_create, 4), \" \",TIME(d.datetime_create)) AS data_criacao,
                    CASE
                        WHEN
                            (SELECT 
                                    COUNT(*)
                                FROM
                                    `pagamento_dividas`
                                WHERE
                                    `minha_divida_id` = d.id_minha_divida AND `mes_id` = $mes_id
                                        AND `ano` = $ano) > 0
                        THEN
                            '<i style=\"color:green;\">Paga</i>'
                        ELSE '<u style=\"color:red;\">A pagar</u>'
                    END AS 'status_button',
                    d.user_update AS usuario,
                    CONCAT(RIGHT(DATE(d.last_update), 2),
                            '/',
                            SUBSTRING(d.last_update, 6, 2),
                            '/',
                            LEFT(d.last_update, 4), \" \",TIME(d.last_update)) AS ultima_atualizacao,
                CASE
                        WHEN
                            (SELECT 
                                    COUNT(*)
                                FROM
                                    `pagamento_dividas`
                                WHERE
                                    `minha_divida_id` = d.id_minha_divida AND `mes_id` = $mes_id
                                        AND `ano` = $ano) > 0
                        THEN
                            'background-color: lightcyan;'
                        ELSE 'background-color: transparent;'
                    END AS 'collor_table',
                CASE
                        WHEN
                            (SELECT 
                                    COUNT(*)
                                FROM
                                    `pagamento_dividas`
                                WHERE
                                    `minha_divida_id` = d.id_minha_divida AND `mes_id` = $mes_id
                                        AND `ano` = $ano) > 0
                        THEN
                            'Paga'
                        ELSE 'Pagar'
                    END AS 'status',
                CASE
                        WHEN
                            (SELECT 
                                    COUNT(*)
                                FROM
                                    `pagamento_dividas`
                                WHERE
                                    `minha_divida_id` = d.id_minha_divida) > 0
                        THEN
                            (SELECT 
                                    MAX(`numero_parcela_paga`)
                                FROM
                                    `pagamento_dividas`
                                WHERE
                                    `minha_divida_id` = d.id_minha_divida)
                        ELSE '0'
                    END AS 'ultima_parcela_paga'
                FROM
                    dividas AS d
                        INNER JOIN
                    tipo_dividas AS td ON d.tipo_divida_id = td.id_tipo_divida
                        INNER JOIN
                    cartoes AS c ON d.cartao_id = c.id_cartao
                        INNER JOIN
                    pessoas AS p ON c.pessoa_id = p.id_pessoa
                        INNER JOIN
                    bancos AS b ON c.banco_id = b.id_banco
                WHERE
                    d.active = 'Y'
                        AND d.codigo_grupo_usuarios = " .addslashes($codigo_grupo_usuarios);
        $result = $conn->execReader($query);
        $array = array();
        while($rs = $result->fetch_array()){
            //$array[] = array($rs["id_minha_divida"], $rs["tipo"], $rs["cartao"], $rs["descricao"], $rs["orgao_devedor"], "R$ ".number_format($rs["valor_parcela"], 2, ',', '.'), "R$ ".number_format($rs["valor_total"], 2, ',', '.'), $rs["numero_parcelas"], $rs["data_inicial"], $rs["dia_mes_vencimento"], $rs["multa_atraso"]."%", $rs["juros_por_dia_atraso"]."%", $rs["desconto_por_dia_adiantado"]."%", $rs["user_update"], (new DateTime($rs["datetime_create"]))->format('d/m/Y H:i:s'), (new DateTime($rs["last_update"]))->format('d/m/Y H:i:s'));
            $array[] = array($rs["id_minha_divida"], $rs["tipo"], $rs["cartao"], $rs["descricao"], $rs["orgao_devedor"], $rs["site"], $rs["valor_parcela"], $rs["numero_parcelas"], $rs["valor_total"], $rs["data_inicial"], $rs["dia_mes_vencimento"], $rs["multa_atraso"], $rs["juros_por_dia_atraso"], $rs["desconto_por_dia_adiantado"], $rs["data_criacao"], $rs["usuario"], $rs["ultima_atualizacao"], $rs["status_button"], $rs["collor_table"], $rs["status"], $rs["ultima_parcela_paga"]);
        }
        return $array;
    }
}
?>