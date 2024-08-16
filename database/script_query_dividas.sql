-- Query para listar dívidas pelo grupo do usuário

select * FROM
    dividas;
    
    
    SELECT  COUNT(*) FROM `pagamento_dividas` WHERE `minha_divida_id` = 4 AND `mes_id` = 4 AND `ano` = 2024;

  
SELECT 
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
    CONCAT(RIGHT(d.datetime_create, 2),
            '/',
            SUBSTRING(d.datetime_create, 6, 2),
            '/',
            LEFT(d.datetime_create, 4)) AS data_criacao,
    CASE
        WHEN
            (SELECT 
                    COUNT(*)
                FROM
                    `pagamento_dividas`
                WHERE
                    `minha_divida_id` = 4 AND `mes_id` = 4
                        AND `ano` = 2024) > 0
        THEN
            '<i style="color:green;">Paga</i>'
        ELSE '<u style="color:red;">A pagar</u>'
    END AS 'status',
    d.user_update AS usuario,
    CONCAT(RIGHT(d.last_update, 2),
            '/',
            SUBSTRING(d.last_update, 6, 2),
            '/',
            LEFT(d.last_update, 4)) AS ultima_atualizacao
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
        AND d.codigo_grupo_usuarios = 1;
        
-- query para listar no campo os cartoes disponíveis

SELECT 
    c.id_cartao AS `id`,
    concat(b.`id_banco`, " ", CASE WHEN b.`nome_abreviado` IS NOT NULL THEN b.`nome_abreviado` ELSE "" END," (", b.`razao_social`, ")") AS `banco`, 
    concat (p.primeiro_nome, " ", p.sobre_nome) AS `nome`
FROM
    grupo_usuarios AS gu
        INNER JOIN
    usuarios AS u ON gu.usuario_id = u.id_usuario
        INNER JOIN
    pessoas AS p ON u.pessoa_id = p.id_pessoa
        INNER JOIN
    cartoes AS c ON p.id_pessoa = c.pessoa_id
       INNER JOIN
    bancos AS b ON c.banco_id = b.id_banco
WHERE
    c.active = 'Y' AND u.active = 'Y'
        AND gu.codigo_grupo = 1;
        
-- GERANDO CARTAO ZERO PARA CADASTRO DE DIVIDAS QUE NAO UTILIZA CARTAO
INSERT INTO `controlefinanceiro`.`cartoes` (`banco_id`, `descricao`, `numero`, `vencimento`, `codigo`, `pessoa_id`, `funcao_credito`, `funcao_debito`, `limite_credito`, `limite_cheque_especial`, `dia_vencimento_fatura`, `cartao_principal`, `encargos`, `multa`, `juros`, `user_update`, `active`) VALUES ('0', ' ', '0', '9999-12-31', '0', '0', 'N', 'N', '0', '0', '9999-12-31', 'N', '0', '0', '0', 'kaiuviny', 'Y');
select * from cartoes;
