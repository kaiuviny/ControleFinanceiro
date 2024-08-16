-- Query para listar despesas fixas e pagamentos
SET @ano = 2024;
SET @mes_id = 06;
SET @dia = 31;
SET @cod_group_user = 1;

SELECT 
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
                        AND `mes_id` = @mes_id
                        AND `ano` = @ano) > 0
        THEN
            '<i style="color:green;">Paga</i>'
        ELSE '<u style="color:red;">A pagar</u>'
    END AS 'status',
    `df`.`user_update`,
    `df`.`last_update`
FROM
    `despesas_fixas` AS `df`
        INNER JOIN
    `categorias` AS `c` ON `df`.`categoria_despesas_fixas_id` = `c`.`id_categoria`
WHERE
    `df`.`data_cadastro` <= DATE(CONCAT(@ano, '-', @mes_id, '-', @dia))
        AND `df`.`active` = 'Y'
        AND `df`.`codigo_grupo_usuarios` = @cod_group_user;
                    
                    
                    select * FROM
    `despesas_fixas`;