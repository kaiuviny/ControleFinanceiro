SELECT descricao, orgao_devedor, valor_parcela, valor_pago, numero_parcela_paga, numero_parcelas  FROM controlefinanceiro.dividas AS d inner join pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id;
/*
'Emprestimo Santander', 'SANTANDER', '278.99', '100.00', '1', '24'
'Emprestimo Santander', 'SANTANDER', '278.99', '284.57', '2', '24'
'Re-Financiamento Terreno Portal dos Pássaros', 'ZITUNE', '2940.88', '1772.89', '4', '4'
*/

SELECT descricao, orgao_devedor, valor_parcela, valor_pago, numero_parcela_paga, numero_parcelas FROM controlefinanceiro.dividas AS d right join pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id;
/*
'Emprestimo Santander', 'SANTANDER', '278.99', '100.00', '1', '24'
'Emprestimo Santander', 'SANTANDER', '278.99', '284.57', '2', '24'
'Re-Financiamento Terreno Portal dos Pássaros', 'ZITUNE', '2940.88', '1772.89', '4', '4'
*/

-- TODAS AS DIVIDAS NAO PAGAS
SELECT descricao, orgao_devedor, valor_parcela, valor_pago, numero_parcela_paga, numero_parcelas, dia_mes_vencimento, data_inicial FROM controlefinanceiro.dividas AS d left join pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE valor_pago IS NULL AND active = 'Y' AND data_inicial <= CURRENT_DATE();
-- VENCIDAS
SELECT descricao, orgao_devedor, valor_parcela, valor_pago, numero_parcela_paga, numero_parcelas, dia_mes_vencimento, data_inicial FROM controlefinanceiro.dividas AS d left join pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE valor_pago IS NULL AND dia_mes_vencimento <= DAY(CURDATE()) AND active = 'Y' AND data_inicial <= CURRENT_DATE();
-- A VENCER
SELECT descricao, orgao_devedor, valor_parcela, valor_pago, numero_parcela_paga, numero_parcelas, dia_mes_vencimento, data_inicial FROM controlefinanceiro.dividas AS d left join pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE valor_pago IS NULL AND dia_mes_vencimento >= DAY(CURDATE()) AND active = 'Y' AND data_inicial <= CURRENT_DATE();
-- SELECT * FROM controlefinanceiro.dividas AS d left join pagamento_dividas AS pd ON d.id_minha_divida = pd.minha_divida_id WHERE valor_pago IS NULL;


/*
'Emprestimo Santander', 'SANTANDER', '278.99', '100.00', '1', '24'
'Emprestimo Santander', 'SANTANDER', '278.99', '284.57', '2', '24'
'Re-Financiamento Terreno Portal dos Pássaros', 'ZITUNE', '2940.88', '1772.89', '4', '4'
*/

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

/*
'1', '1', '0', '1', 'Re-financiamento do mercado pago emprestimos', 'MercadoPago', NULL, '2417.94', '1', '2417.94', '2024-08-29', '29', '8.90', '1.10', '0.00', '2024-08-14 18:10:38', 'kaiuviny', '2024-08-15 10:42:56', 'Y'
'2', '4', '0', '1', 'Terreno portal dos Pássaros - Jardim Vitória', 'ZITUNE', NULL, '1619.52', '37', '112304.50', '2021-02-01', '30', '8.90', '1.10', '0.20', '2024-08-15 12:32:17', 'kaiuviny', '2024-09-09 18:39:24', 'Y'
'3', '4', '0', '1', 'Re-Financiamento Terreno Portal dos Pássaros', 'ZITUNE', NULL, '2940.88', '4', '11763.52', '2024-03-22', '30', '8.90', '1.10', '0.20', '2024-08-15 14:22:28', 'kaiuviny', '2024-08-15 14:22:28', 'Y'
'4', '1', '0', '1', 'Emprestimo Santander', 'SANTANDER', 'https://www.santander.com.br/renegociacao/parcelas-proposta', '278.99', '24', '6695.76', '2024-03-29', '30', '8.90', '1.10', '0.20', '2024-08-15 14:27:43', 'kaiuviny', '2024-08-15 16:18:54', 'Y'
'6', '5', '0', '1', 'Faculdade Uniasselvi - Tecnologo em Big Data', 'UNIASSELVI', NULL, '56.60', '6', '339.60', '2024-01-10', '10', '8.90', '1.10', '0.20', '2024-08-15 14:32:55', 'kaiuviny', '2024-08-15 14:32:55', 'Y'
'7', '5', '0', '1', 'Faculdade Uniasselvi - Engenharia de Software', 'UNIASSELVI', NULL, '350.00', '6', '2700.00', '2023-07-05', '10', '8.90', '1.10', '0.20', '2024-08-15 14:33:40', 'kaiuviny', '2024-08-15 14:36:16', 'Y'
'8', '5', '0', '1', 'Faculdade Uniasselvi - Pós Graduação MBA em BI', 'UNIASSELVI', NULL, '89.90', '24', '2157.60', '2024-01-02', '10', '8.90', '1.10', '0.20', '2024-08-15 14:45:23', 'kaiuviny', '2024-08-15 14:45:23', 'Y'
'9', '5', '0', '1', 'Compra do Carro Ford Fiesta 2012-12', 'JET BALBEK', NULL, '740.00', '48', '35520.00', '2023-01-04', '15', '8.90', '1.10', '0.20', '2024-08-15 14:50:35', 'kaiuviny', '2024-08-15 14:50:35', 'Y'
'47', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '57.53', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:17', 'kaiuviny', '2024-09-15 16:04:17', 'Y'
'48', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '7.44', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:32', 'kaiuviny', '2024-09-15 16:04:32', 'Y'
'49', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '19.44', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:34', 'kaiuviny', '2024-09-15 16:04:34', 'Y'
'50', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '10.61', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:34', 'kaiuviny', '2024-09-15 16:04:34', 'Y'
'51', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '9.80', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:35', 'kaiuviny', '2024-09-15 16:04:35', 'Y'
'52', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '3.06', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:36', 'kaiuviny', '2024-09-15 16:04:36', 'Y'
'53', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '50.00', '3', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:37', 'kaiuviny', '2024-09-15 16:04:37', 'Y'
'54', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '119.61', '6', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:37', 'kaiuviny', '2024-09-15 16:04:37', 'Y'
'55', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '153.38', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:38', 'kaiuviny', '2024-09-15 16:04:38', 'Y'
'56', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '59.94', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:39', 'kaiuviny', '2024-09-15 16:04:39', 'Y'
'57', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '119.61', '6', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:39', 'kaiuviny', '2024-09-15 16:04:39', 'Y'
'58', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '153.38', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:40', 'kaiuviny', '2024-09-15 16:04:40', 'Y'
'59', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '59.94', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:41', 'kaiuviny', '2024-09-15 16:04:41', 'Y'
'60', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '190.21', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:41', 'kaiuviny', '2024-09-15 16:04:41', 'Y'
'61', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '65.69', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:42', 'kaiuviny', '2024-09-15 16:04:42', 'Y'
'62', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '432.12', '3', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:43', 'kaiuviny', '2024-09-15 16:04:43', 'Y'
'63', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '65.08', '6', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:43', 'kaiuviny', '2024-09-15 16:04:43', 'Y'
'64', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '31.88', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:44', 'kaiuviny', '2024-09-15 16:04:44', 'Y'
'65', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '2.60', '10', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:44', 'kaiuviny', '2024-09-15 16:04:44', 'Y'
'66', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '12.19', '11', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:45', 'kaiuviny', '2024-09-15 16:04:45', 'Y'
'67', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '186.03', '5', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:46', 'kaiuviny', '2024-09-15 16:04:46', 'Y'
'68', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '82.00', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:46', 'kaiuviny', '2024-09-15 16:04:46', 'Y'
'69', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '75.00', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:47', 'kaiuviny', '2024-09-15 16:04:47', 'Y'
'70', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '64.38', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:48', 'kaiuviny', '2024-09-15 16:04:48', 'Y'
'71', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '75.00', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:49', 'kaiuviny', '2024-09-15 16:04:49', 'Y'
'72', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '64.38', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:50', 'kaiuviny', '2024-09-15 16:04:50', 'Y'
'73', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '47.30', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:50', 'kaiuviny', '2024-09-15 16:04:50', 'Y'
'74', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '128.82', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:51', 'kaiuviny', '2024-09-15 16:04:51', 'Y'
'75', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '35.00', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:52', 'kaiuviny', '2024-09-15 16:04:52', 'Y'
'76', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '22.00', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:53', 'kaiuviny', '2024-09-15 16:04:53', 'Y'
'77', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '41.80', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:54', 'kaiuviny', '2024-09-15 16:04:54', 'Y'
'78', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '95.19', '3', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:54', 'kaiuviny', '2024-09-15 16:04:54', 'Y'
'79', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '100.44', '2', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:55', 'kaiuviny', '2024-09-15 16:04:55', 'Y'
'80', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '20.00', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:56', 'kaiuviny', '2024-09-15 16:04:56', 'Y'
'81', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '13.97', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:57', 'kaiuviny', '2024-09-15 16:04:57', 'Y'
'82', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '111.37', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:57', 'kaiuviny', '2024-09-15 16:04:57', 'Y'
'83', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '33.87', '1', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:59', 'kaiuviny', '2024-09-15 16:04:59', 'Y'
'84', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '18.76', '6', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:04:59', 'kaiuviny', '2024-09-15 16:04:59', 'Y'
'85', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '56.05', '4', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:05:00', 'kaiuviny', '2024-09-15 16:05:00', 'Y'
'86', '3', '1', '1', 'Gastos Nubank Aline no Cartao Zelly', 'NUBANK', 'nubank.com', '31.24', '4', '0.00', '2024-09-15', '17', NULL, NULL, NULL, '2024-09-15 16:05:01', 'kaiuviny', '2024-09-15 16:05:01', 'Y'
'90', '2', '0', '1', 'Compra Geladeira Consul', 'LOJASCEM', 'lojascem.com.br', '260.40', '12', '3125.04', '2024-09-20', '20', NULL, NULL, NULL, '2024-09-15 16:13:48', 'kaiuviny', '2024-09-15 16:13:48', 'Y'
'91', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '37.49', '1', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'92', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '294.14', '2', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'93', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '34.41', '3', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'94', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '221.55', '1', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'95', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '49.80', '9', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'96', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '161.11', '7', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'97', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '12.67', '4', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'98', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '1374.80', '12', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'99', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '24.82', '2', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'100', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '14.67', '9', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'101', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '417.90', '2', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'102', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '41.96', '1', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'103', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '51.71', '8', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'104', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '49.60', '9', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'105', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '57.35', '5', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'106', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '52.92', '3', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'107', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '22.33', '1', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'108', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '37.74', '11', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'109', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '51.00', '5', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'110', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '62.05', '3', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'111', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '5.26', '7', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'112', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '264.75', '1', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'113', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '150.65', '3', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'114', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '312.03', '5', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'115', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '78.89', '2', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'116', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '539.58', '2', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'117', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '1772.89', '1', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
'118', '3', '2', '1', 'Gastos Carrefour Aline no Cartao Zelly', 'CARREFOUR', 'carrefour.com.br', '1573.35', '1', '0.00', '2024-10-10', '10', NULL, NULL, NULL, '2024-09-15 17:00:02', 'kaiuviny', '2024-09-15 17:00:02', 'Y'
*/