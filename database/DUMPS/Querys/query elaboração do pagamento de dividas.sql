/*
'1', 'Emprestimo'
'2', 'Crediario'
'3', 'Cartao'
'4', 'Financiamento'
'5', 'Boletagem'
*/

/*
'0', '1', '0', ' Sem Cartão', 
'1', '3', '260', 'Nubank Zelly', 
'2', '3', '368', 'Carrefour Zelly',
'4', '1', '368', 'PicPay Caio', 
*/



-- regra de negócios para pegar as dividas que estão devendo, que ainda não venceram

-- 1º pego todas as dividas cadastradas ativas (não quitadas) com a data_inicial antes de hoje
SELECT id_minha_divida, orgao_devedor, valor_parcela, numero_parcelas, dia_mes_vencimento, data_inicial FROM dividas AS d WHERE d.codigo_grupo_usuarios = 1 AND d.active = 'Y' AND data_inicial <= current_date();
/*
# id_minha_divida, orgao_devedor, valor_parcela, numero_parcelas, dia_mes_vencimento, data_inicial
2, ZITUNE, 1619.52, 37, 30, 2021-02-01
3, ZITUNE, 2940.88, 4, 30, 2024-03-22
4, SANTANDER, 278.99, 24, 30, 2024-03-29
7, UNIASSELVI, 350.00, 6, 10, 2023-07-05
8, UNIASSELVI, 89.90, 24, 10, 2024-01-02
9, JET BALBEK, 740.00, 48, 15, 2023-01-04
47, NUBANK, 57.53, 1, 17, 2024-09-15
48, NUBANK, 7.44, 2, 17, 2024-09-15
49, NUBANK, 19.44, 2, 17, 2024-09-15
50, NUBANK, 10.61, 1, 17, 2024-09-15
51, NUBANK, 9.80, 2, 17, 2024-09-15
52, NUBANK, 3.06, 2, 17, 2024-09-15
53, NUBANK, 50.00, 3, 17, 2024-09-15
54, NUBANK, 119.61, 6, 17, 2024-09-15
55, NUBANK, 153.38, 2, 17, 2024-09-15
56, NUBANK, 59.94, 2, 17, 2024-09-15
57, NUBANK, 119.61, 6, 17, 2024-09-15
58, NUBANK, 153.38, 2, 17, 2024-09-15
59, NUBANK, 59.94, 2, 17, 2024-09-15
60, NUBANK, 190.21, 1, 17, 2024-09-15
61, NUBANK, 65.69, 2, 17, 2024-09-15
62, NUBANK, 432.12, 3, 17, 2024-09-15
63, NUBANK, 65.08, 6, 17, 2024-09-15
64, NUBANK, 31.88, 2, 17, 2024-09-15
65, NUBANK, 2.60, 10, 17, 2024-09-15
66, NUBANK, 12.19, 11, 17, 2024-09-15
67, NUBANK, 186.03, 5, 17, 2024-09-15
68, NUBANK, 82.00, 1, 17, 2024-09-15
69, NUBANK, 75.00, 1, 17, 2024-09-15
70, NUBANK, 64.38, 1, 17, 2024-09-15
71, NUBANK, 75.00, 1, 17, 2024-09-15
72, NUBANK, 64.38, 1, 17, 2024-09-15
73, NUBANK, 47.30, 1, 17, 2024-09-15
74, NUBANK, 128.82, 1, 17, 2024-09-15
75, NUBANK, 35.00, 1, 17, 2024-09-15
76, NUBANK, 22.00, 1, 17, 2024-09-15
77, NUBANK, 41.80, 1, 17, 2024-09-15
78, NUBANK, 95.19, 3, 17, 2024-09-15
79, NUBANK, 100.44, 2, 17, 2024-09-15
80, NUBANK, 20.00, 1, 17, 2024-09-15
81, NUBANK, 13.97, 1, 17, 2024-09-15
82, NUBANK, 111.37, 1, 17, 2024-09-15
83, NUBANK, 33.87, 1, 17, 2024-09-15
84, NUBANK, 18.76, 6, 17, 2024-09-15
85, NUBANK, 56.05, 4, 17, 2024-09-15
86, NUBANK, 31.24, 4, 17, 2024-09-15
120, UNIASSELVI, 681.98, 5, 12, 2024-09-12
121, DESCOMPLICA-UNIAMERICA, 149.51, 24, 10, 2024-01-01


-- */

-- 2º separo as que estão vencidas e as que ainda não venceram

-- 3º pego tudo o que foi pago somente este mês,

-- 4º tudo o que foi pago este mes verificado qual(is) parcela(s) foi paga(s) referente a qual(is) mês(es)

-- 5º Verifico se falta alguma parcela em aberto, o numero dela referente ao mês (exemplo parcela 1 deverá ser pago no mes de abril [pago], parcela 3 = mes de junho [pago], parcela 2 = mes maio em aberto)

-- 6º retiro tudo o que já foi pago este mês, verificando o numero da parcela paga referente a qual mes 

-- 7º pego tudo o que eu ainda não não foi pago no mêses anteriores, divida por dívida

-- 8º  some as dividas ainda não pagas com as dividas vencidas deste mes


/*
Obs.: 
1- Na regra verifico divida por divida as parcelas que estão em atraso, não pagos nos mêses anteriores a partir da data inicial até a data de hoje, estão ativas do grupo do usuario 
WHERE d.codigo_grupo_usuarios = 1 AND d.active = 'Y' AND data_inicial <= current_date()
Ex.: começou em janeiro de 2024, quais foram pagas deste esta data...

2- Depois temos todas os IDs das dividas que est'ao abertos

3- Uma por uma das dividas pego o valor de cada parcela multiplicado o numero de parcelas em aberto ate o mes de hoje
	- para isso temos que referenciar o mes iniciante de cada divida, assim referenciamos o numero de parcela para cada mes,
    - e assim vemos quantas parcelas falta, referente a cada mes,
    - pois temos parcela que foi pulada referente a uma mês
    
4- e Cada parcela em atraso dever ser calculada os seus jueros e multas, e após somadas tudo










-- PEGAR A PARCELA DESTE MES E TBM AS ANTERIORES, VENDO SE DESTE MES NÃO FOI PAGA, E AS ANTERIORES QUE NÃO FORAM PAGAS TAMBÉM
-- tabelas
SELECT * FROM dividas;
SELECT * FROM pagamento_dividas;
-- PEGAR AS DIVIDAS DO MES QUE ESTÃO  ATIVAS
SELECT * FROM dividas AS d WHERE d.codigo_grupo_usuarios = 1 AND d.active = 'Y' AND data_inicial <= current_date();

-- PEGAR AS DIVIDAS QUE JÁ ESTÃO PAGAS SOMENTE DESTE MES
SELECT 
    d.descricao, d.orgao_devedor, d.valor_parcela, d.numero_parcelas, d.data_inicial, pd.valor_pago, pd.mes_id, pd.ano, pd.observacao
FROM
    pagamento_dividas AS pd
        INNER JOIN
    dividas AS d ON pd.minha_divida_id = d.id_minha_divida
WHERE
    d.codigo_grupo_usuarios = 1
        AND d.active = 'Y'
        AND data_inicial <= CURRENT_DATE()
        -- AND pd.mes_id = MONTH(CURDATE())
        AND pd.ano = YEAR(CURDATE());






SELECT 
    *
FROM
    dividas AS d
        INNER JOIN
    pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id
WHERE
	data_inicial <= CURRENT_DATE()
    -- AND valor_pago IS NULL
        -- AND mes_id = MONTH(CURDATE())
;
SELECT 
    numero_parcela_paga,
    dia_mes_vencimento,
    24 AS total_parcelas,
    mes_id,
    ano,
    valor_parcela
    -- ,(MONTH(CURDATE()) - mes_id) AS parcelas_restantes_ate_este_mes
FROM
    controlefinanceiro.pagamento_dividas AS pd
        INNER JOIN
    dividas AS d ON pd.minha_divida_id = d.id_minha_divida
WHERE
    minha_divida_id = 4
ORDER BY numero_parcela_paga DESC
LIMIT 1; -- and dia_mes_vencimento <= DAY(CURDATE());