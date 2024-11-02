
-- -----------------------------------------------------
-- INSERT FOR TESTE `ControleFinanceiro`.`Pessoas`
-- -----------------------------------------------------

INSERT INTO `controlefinanceiro`.`mes` (`mes`) VALUES ('Janeiro'),('Fevereiro'),('Março'),('Abril'),('Maio'),('Junho'),('Julho'),('Agosto'),('Setembro'),('Outubro'),('Novembro'),('Dezembro');

INSERT INTO `controlefinanceiro`.`tipo_pessoas` (`tipo_pessoa`, `numero_documento`) VALUES ('F', '39447266851');

INSERT INTO `controlefinanceiro`.`telefones` (`numero_celular`, `numero_telefone`) VALUES ('5511945679635', '551147186685');

INSERT INTO `controlefinanceiro`.`enderecos` (`tipo_logadouro`, `logadouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `pais`, `cep`) VALUES ('Rua', 'Jose carlos Henrique Da Costa', '465', 'Casa B', 'Jardim Brasília', 'São Roque', 'SP', 'Brasil', '18131601');

INSERT INTO `controlefinanceiro`.`acessos` (`acesso`, `nivel_acesso`, `referencia_acesso`) VALUES ('Administrador', '0', 'ADMIN00');

INSERT INTO `controlefinanceiro`.`pessoas` (`primeiro_nome`, `segundo_nome`, `terceiro_nome`, `sobre_nome`, `segundo_sobrenome`, `email`, `data_nascimento`, `user_update`) VALUES ('CAIO', 'VINÍCIUS', '', 'NOLASCO', 'FREITAS', 'kaiuviny@gmail.com', '1990-07-24', 'kaiuviny');


INSERT INTO `controlefinanceiro`.`usuarios` (`pessoa_id`, `usuario`, `senha`, `dias_para_expiracao`) VALUES ('1', 'kaiuviny', '668577', '30');


INSERT INTO `controlefinanceiro`.`telefones_has_pessoas` (`telefone_id`, `pessoa_id`) VALUES ('1', '1');

INSERT INTO `controlefinanceiro`.`enderecos_has_pessoas` (`endereco_id`, `pessoa_id`) VALUES ('1', '1');

INSERT INTO `controlefinanceiro`.`pessoa_has_tipo_pessoa` (`pessoa_id`, `tipo_pessoa_id`) VALUES ('1', '1');

INSERT INTO `controlefinanceiro`.`usuarios_has_acessos` (`usuario_id`, `acesso_id`) VALUES ('1', '1');


INSERT INTO `controlefinanceiro`.`grupo_usuarios` (`codigo_grupo`, `usuario_id`, `descricao`) VALUES ('1', '1', 'grupo admin para QA'), ('2', '1', 'grupo admin para Teste');


-- -----------------------------------------------------
-- INSERT FOR TESTE `ControleFinanceiro`.`WishList`
-- -----------------------------------------------------

INSERT INTO `controlefinanceiro`.`estabelecimentos_wish` (`estabelecimento_wish`, `site_wish`) VALUES ('shopee', 'shopee.com');

INSERT INTO `controlefinanceiro`.`categorias_wish` (`categoria_wish`) VALUES ('eletronicos');

INSERT INTO `controlefinanceiro`.`produtos_wish` (`categoria_wish_id`, `produto_wish`, `descricao_wish`, `valor_wish`) VALUES ('1', 'fone', 'fone de ouvido bass', '19.99');

INSERT INTO `controlefinanceiro`.`wishlist` (`estabelecimento_id`, `produto_id`) VALUES ('1', '1');


