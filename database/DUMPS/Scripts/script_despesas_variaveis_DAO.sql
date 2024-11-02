SELECT 
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
    dv.datetime_cretate,
    dv.user_update,
    dv.last_update,
    fp.tipo,
    ct.descricao,
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
    dv.codigo_grupo_usuarios = 1
    AND dv.mes_id =11
    AND dv.ano = 2024;
    
    
