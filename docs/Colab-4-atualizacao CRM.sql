
--
-- Estrutura para tabela `bancos`
--

CREATE TABLE `bancos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_banco` varchar(150) NOT NULL,
  `cod_banco` varchar(50) DEFAULT NULL,
  `ic_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bancos` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_banco`, `cod_banco`, `ic_status`) VALUES
(1, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '001 – Banco do Brasil S.A.', NULL, 1),
(2, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '033 – Banco Santander (Brasil) S.A.', NULL, 1),
(3, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '104 – Caixa Econômica Federal', NULL, 1),
(4, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '237 – Banco Bradesco S.A.', NULL, 1),
(5, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '341 – Banco Itaú S.A.', NULL, 1),
(6, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '356 – Banco Real S.A. (antigo)', NULL, 1),
(7, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '389 – Banco Mercantil do Brasil S.A.', NULL, 1),
(8, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '399 – HSBC Bank Brasil S.A. – Banco Múltiplo', NULL, 1),
(9, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '422 – Banco Safra S.A.', NULL, 1),
(10, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '453 – Banco Rural S.A.', NULL, 1),
(11, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '633 – Banco Rendimento S.A.', NULL, 1),
(12, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '652 – Itaú Unibanco Holding S.A.', NULL, 1),
(13, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '745 – Banco Citibank S.A.', NULL, 1),
(14, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '246 – Banco ABC Brasil S.A.', NULL, 1),
(15, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '025 – Banco Alfa S.A.', NULL, 1),
(16, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '641 – Banco Alvorada S.A.', NULL, 1),
(17, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '029 – Banco Banerj S.A.', NULL, 1),
(18, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '038 – Banco Banestado S.A.', NULL, 1),
(19, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '000 – Banco Bankpar S.A.', NULL, 1),
(20, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '740 – Banco Barclays S.A.', NULL, 1),
(21, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '107 – Banco BBM S.A.', NULL, 1),
(22, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '031 – Banco Beg S.A.', NULL, 1),
(23, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '096 – Banco BM&F de Serviços de Liquidação e Custódia S.A', NULL, 1),
(24, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '318 – Banco BMG S.A.', NULL, 1),
(25, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '752 – Banco BNP Paribas Brasil S.A.', NULL, 1),
(26, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '248 – Banco Boavista Interatlântico S.A.', NULL, 1),
(27, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '036 – Banco Bradesco BBI S.A.', NULL, 1),
(28, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '204 – Banco Bradesco Cartões S.A.', NULL, 1),
(29, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '225 – Banco Brascan S.A.', NULL, 1),
(30, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '044 – Banco BVA S.A.', NULL, 1),
(31, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '263 – Banco Cacique S.A.', NULL, 1),
(32, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '473 – Banco Caixa Geral – Brasil S.A.', NULL, 1),
(33, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '222 – Banco Calyon Brasil S.A.', NULL, 1),
(34, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '040 – Banco Cargill S.A.', NULL, 1),
(35, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M08 – Banco Citicard S.A.', NULL, 1),
(36, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M19 – Banco CNH Capital S.A.', NULL, 1),
(37, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '215 – Banco Comercial e de Investimento Sudameris S.A.', NULL, 1),
(38, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '756 – Banco Cooperativo do Brasil S.A. – BANCOOB', NULL, 1),
(39, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '748 – Banco Cooperativo Sicredi S.A.', NULL, 1),
(40, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '505 – Banco Credit Suisse (Brasil) S.A.', NULL, 1),
(41, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '229 – Banco Cruzeiro do Sul S.A.', NULL, 1),
(42, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '003 – Banco da Amazônia S.A.', NULL, 1),
(43, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '083-3 – Banco da China Brasil S.A.', NULL, 1),
(44, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '707 – Banco Daycoval S.A.', NULL, 1),
(45, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M06 – Banco de Lage Landen Brasil S.A.', NULL, 1),
(46, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '024 – Banco de Pernambuco S.A. – BANDEPE', NULL, 1),
(47, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '456 – Banco de Tokyo-Mitsubishi UFJ Brasil S.A.', NULL, 1),
(48, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '214 – Banco Dibens S.A.', NULL, 1),
(49, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '047 – Banco do Estado de Sergipe S.A.', NULL, 1),
(50, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '037 – Banco do Estado do Pará S.A.', NULL, 1),
(51, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '041 – Banco do Estado do Rio Grande do Sul S.A.', NULL, 1),
(52, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '004 – Banco do Nordeste do Brasil S.A.', NULL, 1),
(53, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '265 – Banco Fator S.A.', NULL, 1),
(54, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M03 – Banco Fiat S.A.', NULL, 1),
(55, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '224 – Banco Fibra S.A.', NULL, 1),
(56, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '626 – Banco Ficsa S.A.', NULL, 1),
(57, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '394 – Banco Finasa BMC S.A.', NULL, 1),
(58, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M18 – Banco Ford S.A.', NULL, 1),
(59, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '233 – Banco GE Capital S.A.', NULL, 1),
(60, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '734 – Banco Gerdau S.A.', NULL, 1),
(61, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M07 – Banco GMAC S.A.', NULL, 1),
(62, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '612 – Banco Guanabara S.A.', NULL, 1),
(63, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M22 – Banco Honda S.A.', NULL, 1),
(64, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '063 – Banco Ibi S.A. Banco Múltiplo', NULL, 1),
(65, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M11 – Banco IBM S.A.', NULL, 1),
(66, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '604 – Banco Industrial do Brasil S.A.', NULL, 1),
(67, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '320 – Banco Industrial e Comercial S.A.', NULL, 1),
(68, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '653 – Banco Indusval S.A.', NULL, 1),
(69, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '630 – Banco Intercap S.A.', NULL, 1),
(70, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '249 – Banco Investcred Unibanco S.A.', NULL, 1),
(71, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '184 – Banco Itaú BBA S.A.', NULL, 1),
(72, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '479 – Banco ItaúBank S.A', NULL, 1),
(73, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M09 – Banco Itaucred Financiamentos S.A.', NULL, 1),
(74, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '376 – Banco J. P. Morgan S.A.', NULL, 1),
(75, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '074 – Banco J. Safra S.A.', NULL, 1),
(76, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '217 – Banco John Deere S.A.', NULL, 1),
(77, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '065 – Banco Lemon S.A.', NULL, 1),
(78, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '600 – Banco Luso Brasileiro S.A.', NULL, 1),
(79, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '755 – Banco Merrill Lynch de Investimentos S.A.', NULL, 1),
(80, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '746 – Banco Modal S.A.', NULL, 1),
(81, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '151 – Banco Nossa Caixa S.A.', NULL, 1),
(82, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '045 – Banco Opportunity S.A.', NULL, 1),
(83, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '623 – Banco Panamericano S.A.', NULL, 1),
(84, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '611 – Banco Paulista S.A.', NULL, 1),
(85, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '643 – Banco Pine S.A.', NULL, 1),
(86, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '638 – Banco Prosper S.A.', NULL, 1),
(87, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '747 – Banco Rabobank International Brasil S.A.', NULL, 1),
(88, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M16 – Banco Rodobens S.A.', NULL, 1),
(89, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '072 – Banco Rural Mais S.A.', NULL, 1),
(90, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '250 – Banco Schahin S.A.', NULL, 1),
(91, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '749 – Banco Simples S.A.', NULL, 1),
(92, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '366 – Banco Société Générale Brasil S.A.', NULL, 1),
(93, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '637 – Banco Sofisa S.A.', NULL, 1),
(94, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '464 – Banco Sumitomo Mitsui Brasileiro S.A.', NULL, 1),
(95, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '082-5 – Banco Topázio S.A.', NULL, 1),
(96, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M20 – Banco Toyota do Brasil S.A.', NULL, 1),
(97, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '634 – Banco Triângulo S.A.', NULL, 1),
(98, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '208 – Banco UBS Pactual S.A.', NULL, 1),
(99, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, 'M14 – Banco Volkswagen S.A.', NULL, 1),
(100, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '655 – Banco Votorantim S.A.', NULL, 1),
(101, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '610 – Banco VR S.A.', NULL, 1),
(102, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '370 – Banco WestLB do Brasil S.A.', NULL, 1),
(103, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '021 – BANESTES S.A. Banco do Estado do Espírito Santo', NULL, 1),
(104, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '719 – Banif-Banco Internacional do Funchal (Brasil)S.A.', NULL, 1),
(105, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '073 – BB Banco Popular do Brasil S.A.', NULL, 1),
(106, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '078 – BES Investimento do Brasil S.A.-Banco de Investimento', NULL, 1),
(107, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '069 – BPN Brasil Banco Múltiplo S.A.', NULL, 1),
(108, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '070 – BRB – Banco de Brasília S.A.', NULL, 1),
(109, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '477 – Citibank N.A.', NULL, 1),
(110, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '081-7 – Concórdia Banco S.A.', NULL, 1),
(111, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '487 – Deutsche Bank S.A. – Banco Alemão', NULL, 1),
(112, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '751 – Dresdner Bank Brasil S.A. – Banco Múltiplo', NULL, 1),
(113, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '062 – Hipercard Banco Múltiplo S.A.', NULL, 1),
(114, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '492 – ING Bank N.V.', NULL, 1),
(115, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '488 – JPMorgan Chase Bank', NULL, 1),
(116, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '409 – UNIBANCO – União de Bancos Brasileiros S.A.', NULL, 1),
(117, '2020-11-16 17:16:57', 1, '2020-11-16 17:16:57', 1, '230 – Unicard Banco Múltiplo S.A.', NULL, 1),
(118, '2021-02-01 17:55:44', 1, '2021-02-01 17:55:44', 1, '77 - BANCO INTER', '77', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`pk`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bancos`
--
ALTER TABLE `bancos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;







INSERT INTO `wwgepr_alencar`.`classificacao_operadoras`
(
`dt_cadastro`,
`ds_classificacao`)
VALUES
(sysdate(),'Refinanciamento');



INSERT INTO `wwgepr_alencar`.`classificacao_operadoras`
(
`dt_cadastro`,
`ds_classificacao`)
VALUES
(sysdate(),'Margem');



INSERT INTO `wwgepr_alencar`.`classificacao_operadoras`
(
`dt_cadastro`,
`ds_classificacao`)
VALUES
(sysdate(),'Portabilidade');


INSERT INTO `wwgepr_alencar`.`classificacao_operadoras`
(
`dt_cadastro`,
`ds_classificacao`)
VALUES
(sysdate(),'Cartão');


INSERT INTO `wwgepr_alencar`.`classificacao_operadoras`
(
`dt_cadastro`,
`ds_classificacao`)
VALUES
(sysdate(),'FGTS');



INSERT INTO `wwgepr_alencar`.`classificacao_operadoras`
(
`dt_cadastro`,
`ds_classificacao`)
VALUES
(sysdate(),'Credito Pessoal');


ALTER TABLE `wwgepr_alencar`.`leads` 
ADD COLUMN `n_beneficio` INT NULL AFTER `ds_digito`;


ALTER TABLE `wwgepr_alencar`.`propostas` 
ADD COLUMN `tx_juros` VARCHAR(45) NULL AFTER `processos_etapas_pk`;



