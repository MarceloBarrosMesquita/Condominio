-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 24-Fev-2022 às 17:41
-- Versão do servidor: 5.7.37
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create database 'teste'
--
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `afastamento_ferias_colaborador`
--

CREATE TABLE `afastamento_ferias_colaborador` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `tipo_apontamento` int(11) NOT NULL,
  `dt_inicio` date NOT NULL,
  `dt_fim` date DEFAULT NULL,
  `ds_obs` text,
  `colaborador_pk` int(11) NOT NULL,
  `leads_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `afastamento_ferias_colaborador`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `agendas`
--

CREATE TABLE `agendas` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `tipos_agendas_pk` int(11) NOT NULL,
  `dt_agenda` datetime NOT NULL,
  `aviso_pk` int(11) DEFAULT NULL,
  `dt_termino` datetime DEFAULT NULL,
  `dt_reagendamento` datetime DEFAULT NULL,
  `motivo_reagendamento_pk` int(11) DEFAULT NULL,
  `ds_obs_reagendamento` longtext,
  `dt_cancelamento` datetime DEFAULT NULL,
  `motivo_cancelamento_pk` int(11) DEFAULT NULL,
  `ds_obs_cancelamento` longtext,
  `classificacao_agenda_pk` int(11) DEFAULT NULL,
  `ds_cep` varchar(12) DEFAULT NULL,
  `ds_endereco` varchar(100) DEFAULT NULL,
  `ds_numero` varchar(12) DEFAULT NULL,
  `ds_complemento` varchar(45) DEFAULT NULL,
  `ds_bairro` varchar(100) DEFAULT NULL,
  `ds_cidade` varchar(100) DEFAULT NULL,
  `ds_uf` varchar(2) DEFAULT NULL,
  `ds_obs` longtext,
  `ic_status` int(11) DEFAULT NULL,
  `ds_contato` varchar(100) DEFAULT NULL,
  `ds_cel` varchar(20) DEFAULT NULL,
  `ds_tel` varchar(20) DEFAULT NULL,
  `ds_email` varchar(100) DEFAULT NULL,
  `cargos_pk` int(11) DEFAULT NULL,
  `leads_pk` int(11) NOT NULL,
  `processos_etapas_pk` int(11) NOT NULL,
  `ds_obs_classificacao` longtext,
  `agenda_reagendamento_pk` int(11) DEFAULT NULL,
  `tipo_evento_pk` int(11) DEFAULT NULL,
  `ds_titulo_agenda` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendas_responsavel`
--

CREATE TABLE `agendas_responsavel` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `usuarios_pk` int(11) NOT NULL,
  `agendas_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_colaborador_padrao`
--

CREATE TABLE `agenda_colaborador_padrao` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_agenda` varchar(45) DEFAULT NULL,
  `dt_inicio_agenda` date NOT NULL,
  `dt_fim_agenda` date DEFAULT NULL,
  `colaboradores_pk` int(11) NOT NULL,
  `processos_etapas_pk` int(11) NOT NULL,
  `ic_dom` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Ativo; 2 = Inativo',
  `ic_seg` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Ativo; 2 = Inativo',
  `ic_ter` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Ativo; 2 = Inativo',
  `ic_qua` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Ativo; 2 = Inativo',
  `ic_qui` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Ativo; 2 = Inativo',
  `ic_sex` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Ativo; 2 = Inativo',
  `ic_sab` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Ativo; 2 = Inativo',
  `dom_turnos_pk` int(11) DEFAULT NULL COMMENT 'relaciona a tabela turnos',
  `seg_turnos_pk` int(11) DEFAULT NULL,
  `ter_turnos_pk` int(11) DEFAULT NULL,
  `qua_turnos_pk` int(11) DEFAULT NULL,
  `qui_turnos_pk` int(11) DEFAULT NULL,
  `sex_turnos_pk` int(11) DEFAULT NULL,
  `sab_turnos_pk` int(11) DEFAULT NULL,
  `contratos_itens_pk` int(11) NOT NULL,
  `hr_turno_seg` time DEFAULT NULL,
  `hr_turno_ter` time DEFAULT NULL,
  `hr_turno_qua` time DEFAULT NULL,
  `hr_turno_qui` time DEFAULT NULL,
  `hr_turno_sex` time DEFAULT NULL,
  `hr_turno_sab` time DEFAULT NULL,
  `hr_turno_dom` time DEFAULT NULL,
  `hr_turno_dom_saida` time DEFAULT NULL,
  `hr_turno_seg_saida` time DEFAULT NULL,
  `hr_turno_ter_saida` time DEFAULT NULL,
  `hr_turno_qua_saida` time DEFAULT NULL,
  `hr_turno_qui_saida` time DEFAULT NULL,
  `hr_turno_sex_saida` time DEFAULT NULL,
  `hr_turno_sab_saida` time DEFAULT NULL,
  `nao_repetir_proxima_semana_pk` int(11) DEFAULT NULL,
  `ic_nao_repetir` int(11) DEFAULT NULL,
  `ic_dom_folga` int(11) DEFAULT NULL,
  `ic_seg_folga` int(11) DEFAULT NULL,
  `ic_ter_folga` int(11) DEFAULT NULL,
  `ic_qua_folga` int(11) DEFAULT NULL,
  `ic_qui_folga` int(11) DEFAULT NULL,
  `ic_sex_folga` int(11) DEFAULT NULL,
  `ic_sab_folga` int(11) DEFAULT NULL,
  `ic_folga_inverter` int(11) DEFAULT NULL,
  `dt_cancelamento` date DEFAULT NULL,
  `ds_motivo_cancelamento` text,
  `tipo_escala` int(11) DEFAULT NULL,
  `hr_intervalo_seg` time DEFAULT NULL,
  `hr_intervalo_ter` time DEFAULT NULL,
  `hr_intervalo_qua` time DEFAULT NULL,
  `hr_intervalo_qui` time DEFAULT NULL,
  `hr_intervalo_sex` time DEFAULT NULL,
  `hr_intervalo_sab` time DEFAULT NULL,
  `hr_intervalo_saida_seg` time DEFAULT NULL,
  `hr_intervalo_saida_ter` time DEFAULT NULL,
  `hr_intervalo_saida_qua` time DEFAULT NULL,
  `hr_intervalo_saida_qui` time DEFAULT NULL,
  `hr_intervalo_saida_sex` time DEFAULT NULL,
  `hr_intervalo_saida_sab` time DEFAULT NULL,
  `hr_intervalo_dom` time DEFAULT NULL,
  `hr_intervalo_saida_dom` time DEFAULT NULL,
  `leads_pk` int(11) DEFAULT NULL,
  `produtos_servicos_pk` int(11) NOT NULL,
  `n_qtde_dias_semana` varchar(45) NOT NULL,
  `turnos_pk` int(11) DEFAULT NULL,
  `hr_inicio_expediente` time DEFAULT NULL,
  `hr_termino_expediente` time DEFAULT NULL,
  `hr_saida_intervalo` time DEFAULT NULL,
  `hr_retorno_intervalo` time DEFAULT NULL,
  `ic_preenchimento_automatico` int(11) DEFAULT NULL,
  `processo_pk` int(11) DEFAULT NULL,
  `contratos_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_colaborador_pausa`
--

CREATE TABLE `agenda_colaborador_pausa` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_agenda_colaborador_pausa` varchar(45) NOT NULL,
  `dt_inicio_pausa` date NOT NULL,
  `dt_fim_pausa` date NOT NULL,
  `motivos_pausas_pk` int(11) DEFAULT NULL,
  `colaboradores_pk` int(11) NOT NULL,
  `turnos_pk` int(11) NOT NULL,
  `colaborador_subistituto_pk` int(11) DEFAULT NULL,
  `colaborador_substituto_pk` int(11) DEFAULT NULL,
  `ds_obs_exclusao` varchar(100) DEFAULT NULL,
  `motivo_exclusao_pk` int(11) DEFAULT NULL,
  `motivo_folga_pk` int(11) DEFAULT NULL,
  `ds_obs_folga` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_colaborador_tarefa`
--

CREATE TABLE `agenda_colaborador_tarefa` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_tarefa` varchar(100) NOT NULL,
  `obs_tarefa` text,
  `hr_inicio` varchar(8) NOT NULL,
  `usuario_termino_pk` int(11) DEFAULT NULL,
  `dt_termino` datetime DEFAULT NULL,
  `obs_termino_tarefa` text,
  `dt_alteracao_tarefa` date DEFAULT NULL,
  `ic_dia` varchar(5) NOT NULL,
  `agendas_pk` int(11) DEFAULT NULL,
  `dt_execucao` date DEFAULT NULL,
  `ic_tarefa_recorrente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apontamentos`
--

CREATE TABLE `apontamentos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro _pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `dt_ponto` date DEFAULT NULL,
  `hr_entrada` varchar(45) DEFAULT NULL,
  `hr_saida` varchar(45) DEFAULT NULL,
  `ds_local_atual` varchar(45) DEFAULT NULL,
  `apontamento_usuario_pk` int(11) NOT NULL,
  `obs` text,
  `leads_pk` int(11) DEFAULT NULL,
  `c_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apontamento_servico_extra`
--

CREATE TABLE `apontamento_servico_extra` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `colaborador_pk` int(11) NOT NULL,
  `dt_escala` date NOT NULL,
  `leads_pk` int(11) NOT NULL,
  `contratos_pk` int(11) NOT NULL,
  `contratos_itens_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `apontamento_servico_extra`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `bancos`
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

--
-- Extraindo dados da tabela `bancos`
--

INSERT INTO `bancos` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_banco`, `cod_banco`, `ic_status`) VALUES
(1, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '001 – Banco do Brasil S.A.', NULL, 1),
(2, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '033 – Banco Santander (Brasil) S.A.', NULL, 1),
(3, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '104 – Caixa Econômica Federal', NULL, 1),
(4, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '237 – Banco Bradesco S.A.', NULL, 1),
(5, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '341 – Banco Itaú S.A.', NULL, 1),
(6, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '356 – Banco Real S.A. (antigo)', NULL, 1),
(7, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '389 – Banco Mercantil do Brasil S.A.', NULL, 1),
(8, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '399 – HSBC Bank Brasil S.A. – Banco Múltiplo', NULL, 1),
(9, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '422 – Banco Safra S.A.', NULL, 1),
(10, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '453 – Banco Rural S.A.', NULL, 1),
(11, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '633 – Banco Rendimento S.A.', NULL, 1),
(12, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '652 – Itaú Unibanco Holding S.A.', NULL, 1),
(13, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '745 – Banco Citibank S.A.', NULL, 1),
(14, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '246 – Banco ABC Brasil S.A.', NULL, 1),
(15, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '025 – Banco Alfa S.A.', NULL, 1),
(16, '2020-11-16 17:16:46', 1, '2020-11-16 17:16:46', 1, '641 – Banco Alvorada S.A.', NULL, 1),
(17, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '029 – Banco Banerj S.A.', NULL, 1),
(18, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '038 – Banco Banestado S.A.', NULL, 1),
(19, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '000 – Banco Bankpar S.A.', NULL, 1),
(20, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '740 – Banco Barclays S.A.', NULL, 1),
(21, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '107 – Banco BBM S.A.', NULL, 1),
(22, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '031 – Banco Beg S.A.', NULL, 1),
(23, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '096 – Banco BM&F de Serviços de Liquidação e Custódia S.A', NULL, 1),
(24, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '318 – Banco BMG S.A.', NULL, 1),
(25, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '752 – Banco BNP Paribas Brasil S.A.', NULL, 1),
(26, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '248 – Banco Boavista Interatlântico S.A.', NULL, 1),
(27, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '036 – Banco Bradesco BBI S.A.', NULL, 1),
(28, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '204 – Banco Bradesco Cartões S.A.', NULL, 1),
(29, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '225 – Banco Brascan S.A.', NULL, 1),
(30, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '044 – Banco BVA S.A.', NULL, 1),
(31, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '263 – Banco Cacique S.A.', NULL, 1),
(32, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '473 – Banco Caixa Geral – Brasil S.A.', NULL, 1),
(33, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '222 – Banco Calyon Brasil S.A.', NULL, 1),
(34, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '040 – Banco Cargill S.A.', NULL, 1),
(35, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M08 – Banco Citicard S.A.', NULL, 1),
(36, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M19 – Banco CNH Capital S.A.', NULL, 1),
(37, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '215 – Banco Comercial e de Investimento Sudameris S.A.', NULL, 1),
(38, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '756 – Banco Cooperativo do Brasil S.A. – BANCOOB', NULL, 1),
(39, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '748 – Banco Cooperativo Sicredi S.A.', NULL, 1),
(40, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '505 – Banco Credit Suisse (Brasil) S.A.', NULL, 1),
(41, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '229 – Banco Cruzeiro do Sul S.A.', NULL, 1),
(42, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '003 – Banco da Amazônia S.A.', NULL, 1),
(43, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '083-3 – Banco da China Brasil S.A.', NULL, 1),
(44, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '707 – Banco Daycoval S.A.', NULL, 1),
(45, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M06 – Banco de Lage Landen Brasil S.A.', NULL, 1),
(46, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '024 – Banco de Pernambuco S.A. – BANDEPE', NULL, 1),
(47, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '456 – Banco de Tokyo-Mitsubishi UFJ Brasil S.A.', NULL, 1),
(48, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '214 – Banco Dibens S.A.', NULL, 1),
(49, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '047 – Banco do Estado de Sergipe S.A.', NULL, 1),
(50, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '037 – Banco do Estado do Pará S.A.', NULL, 1),
(51, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '041 – Banco do Estado do Rio Grande do Sul S.A.', NULL, 1),
(52, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '004 – Banco do Nordeste do Brasil S.A.', NULL, 1),
(53, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '265 – Banco Fator S.A.', NULL, 1),
(54, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M03 – Banco Fiat S.A.', NULL, 1),
(55, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '224 – Banco Fibra S.A.', NULL, 1),
(56, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '626 – Banco Ficsa S.A.', NULL, 1),
(57, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '394 – Banco Finasa BMC S.A.', NULL, 1),
(58, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M18 – Banco Ford S.A.', NULL, 1),
(59, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '233 – Banco GE Capital S.A.', NULL, 1),
(60, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '734 – Banco Gerdau S.A.', NULL, 1),
(61, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M07 – Banco GMAC S.A.', NULL, 1),
(62, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '612 – Banco Guanabara S.A.', NULL, 1),
(63, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M22 – Banco Honda S.A.', NULL, 1),
(64, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '063 – Banco Ibi S.A. Banco Múltiplo', NULL, 1),
(65, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M11 – Banco IBM S.A.', NULL, 1),
(66, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '604 – Banco Industrial do Brasil S.A.', NULL, 1),
(67, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '320 – Banco Industrial e Comercial S.A.', NULL, 1),
(68, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '653 – Banco Indusval S.A.', NULL, 1),
(69, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '630 – Banco Intercap S.A.', NULL, 1),
(70, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '249 – Banco Investcred Unibanco S.A.', NULL, 1),
(71, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '184 – Banco Itaú BBA S.A.', NULL, 1),
(72, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '479 – Banco ItaúBank S.A', NULL, 1),
(73, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M09 – Banco Itaucred Financiamentos S.A.', NULL, 1),
(74, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '376 – Banco J. P. Morgan S.A.', NULL, 1),
(75, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '074 – Banco J. Safra S.A.', NULL, 1),
(76, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '217 – Banco John Deere S.A.', NULL, 1),
(77, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '065 – Banco Lemon S.A.', NULL, 1),
(78, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '600 – Banco Luso Brasileiro S.A.', NULL, 1),
(79, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '755 – Banco Merrill Lynch de Investimentos S.A.', NULL, 1),
(80, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '746 – Banco Modal S.A.', NULL, 1),
(81, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '151 – Banco Nossa Caixa S.A.', NULL, 1),
(82, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '045 – Banco Opportunity S.A.', NULL, 1),
(83, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '623 – Banco Panamericano S.A.', NULL, 1),
(84, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '611 – Banco Paulista S.A.', NULL, 1),
(85, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '643 – Banco Pine S.A.', NULL, 1),
(86, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '638 – Banco Prosper S.A.', NULL, 1),
(87, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '747 – Banco Rabobank International Brasil S.A.', NULL, 1),
(88, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M16 – Banco Rodobens S.A.', NULL, 1),
(89, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '072 – Banco Rural Mais S.A.', NULL, 1),
(90, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '250 – Banco Schahin S.A.', NULL, 1),
(91, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '749 – Banco Simples S.A.', NULL, 1),
(92, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '366 – Banco Société Générale Brasil S.A.', NULL, 1),
(93, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '637 – Banco Sofisa S.A.', NULL, 1),
(94, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '464 – Banco Sumitomo Mitsui Brasileiro S.A.', NULL, 1),
(95, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '082-5 – Banco Topázio S.A.', NULL, 1),
(96, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M20 – Banco Toyota do Brasil S.A.', NULL, 1),
(97, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '634 – Banco Triângulo S.A.', NULL, 1),
(98, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '208 – Banco UBS Pactual S.A.', NULL, 1),
(99, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, 'M14 – Banco Volkswagen S.A.', NULL, 1),
(100, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '655 – Banco Votorantim S.A.', NULL, 1),
(101, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '610 – Banco VR S.A.', NULL, 1),
(102, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '370 – Banco WestLB do Brasil S.A.', NULL, 1),
(103, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '021 – BANESTES S.A. Banco do Estado do Espírito Santo', NULL, 1),
(104, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '719 – Banif-Banco Internacional do Funchal (Brasil)S.A.', NULL, 1),
(105, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '073 – BB Banco Popular do Brasil S.A.', NULL, 1),
(106, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '078 – BES Investimento do Brasil S.A.-Banco de Investimento', NULL, 1),
(107, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '069 – BPN Brasil Banco Múltiplo S.A.', NULL, 1),
(108, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '070 – BRB – Banco de Brasília S.A.', NULL, 1),
(109, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '477 – Citibank N.A.', NULL, 1),
(110, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '081-7 – Concórdia Banco S.A.', NULL, 1),
(111, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '487 – Deutsche Bank S.A. – Banco Alemão', NULL, 1),
(112, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '751 – Dresdner Bank Brasil S.A. – Banco Múltiplo', NULL, 1),
(113, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '062 – Hipercard Banco Múltiplo S.A.', NULL, 1),
(114, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '492 – ING Bank N.V.', NULL, 1),
(115, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '488 – JPMorgan Chase Bank', NULL, 1),
(116, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '409 – UNIBANCO – União de Bancos Brasileiros S.A.', NULL, 1),
(117, '2020-11-16 17:16:47', 1, '2020-11-16 17:16:47', 1, '230 – Unicard Banco Múltiplo S.A.', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `beneficios`
--

CREATE TABLE `beneficios` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_beneficio` varchar(100) NOT NULL,
  `ic_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carga_colaborador`
--

CREATE TABLE `carga_colaborador` (
  `codigo` varchar(20) DEFAULT NULL,
  `ds_nome` varchar(200) DEFAULT NULL,
  `dt_adminissao` varchar(20) DEFAULT NULL,
  `ds_funcao` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carga_colaborador`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `carga_colaboradore_leads`
--

CREATE TABLE `carga_colaboradore_leads` (
  `CondominioSistema` varchar(200) DEFAULT NULL,
  `CondAtual` varchar(200) DEFAULT NULL,
  `Horarios` varchar(20) DEFAULT NULL,
  `Vigilante` varchar(200) DEFAULT NULL,
  `RE` varchar(20) DEFAULT NULL,
  `Colaborador` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carga_colaboradore_leads`
--



-- --------------------------------------------------------

--
-- Estrutura da tabela `carga_planocontas`
--

CREATE TABLE `carga_planocontas` (
  `cod` varchar(45) DEFAULT NULL,
  `ds_categoria` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carga_planocontas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--



-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_financeiras`
--

CREATE TABLE `categorias_financeiras` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_categoria` varchar(150) NOT NULL,
  `ic_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias_financeiras`
--

INSERT INTO `categorias_financeiras` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_categoria`, `ic_status`) VALUES
(1, '2020-11-16 11:13:35', 1, '2020-11-16 11:13:35', 1, 'Categoria Financeira', 1),
(1000, '2021-07-19 17:39:40', 1, '2021-07-19 17:39:40', 1, 'a Contrato(s) / Serviço(s) Extra(s)', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_produto`
--

CREATE TABLE `categorias_produto` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_categoria` varchar(200) NOT NULL,
  `ic_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias_produto`
--

INSERT INTO `categorias_produto` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_categoria`, `ic_status`) VALUES
(1, '2022-02-09 09:29:31', 29, '2022-02-09 09:29:31', 29, 'UNIFORME', '1'),
(2, '2022-02-09 10:00:07', 29, '2022-02-09 10:00:07', 29, 'UNIFORME', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_colaborador` varchar(45) NOT NULL,
  `ds_cel` varchar(20) NOT NULL,
  `ic_whatsapp` int(11) NOT NULL DEFAULT '1' COMMENT '1 - sim; 2 - nao',
  `ds_email` varchar(100) DEFAULT NULL,
  `ds_rg` varchar(15) NOT NULL,
  `ds_cpf` varchar(15) NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `ds_endereco` varchar(100) DEFAULT NULL,
  `ds_numero` varchar(10) DEFAULT NULL,
  `ds_complemento` varchar(10) DEFAULT NULL,
  `ds_bairro` varchar(60) DEFAULT NULL,
  `ds_cep` varchar(9) DEFAULT NULL,
  `ds_cidade` varchar(60) DEFAULT NULL,
  `ds_uf` varchar(2) DEFAULT NULL,
  `ic_status` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Ativo; 2 - Inativo',
  `generos_pk` int(11) NOT NULL,
  `ic_funcionario` int(11) DEFAULT '2' COMMENT '1 - Sim; 2- Nao',
  `ds_cel1` varchar(20) DEFAULT NULL,
  `ic_whatsapp1` int(11) DEFAULT '2' COMMENT '1 - sim; 2 - nao',
  `ds_cel2` varchar(20) DEFAULT NULL,
  `ic_whatsapp2` int(11) DEFAULT '2' COMMENT '1 - sim; 2 - nao',
  `ds_cel3` varchar(20) DEFAULT NULL,
  `ic_whatsapp3` int(11) DEFAULT '2' COMMENT '1 - sim; 2 - nao',
  `ds_pin` varchar(45) DEFAULT NULL,
  `ds_re` varchar(45) DEFAULT NULL,
  `ds_raca` varchar(45) DEFAULT NULL,
  `ds_deficiencia_fisica` varchar(45) DEFAULT NULL,
  `estado_civil` int(11) DEFAULT NULL COMMENT '1-solteiro;2-Casado;3-Separado;4-Divorciado;5-Viuvo',
  `ds_nome_pai` varchar(45) DEFAULT NULL,
  `ds_nome_mae` varchar(45) DEFAULT NULL,
  `ds_nome_conjuge` varchar(45) DEFAULT NULL,
  `dt_nascimento_conjuge` varchar(45) DEFAULT NULL,
  `ds_cpf_conjuge` varchar(45) DEFAULT NULL,
  `ds_tel_conjuge` varchar(45) DEFAULT NULL,
  `regime_casamento` int(11) DEFAULT NULL COMMENT '1-comunhão parcial;2-comunhão universal;3-participação final nos aquestos e separação convencional de bens',
  `ds_ctps` varchar(45) DEFAULT NULL,
  `ds_serie` varchar(45) DEFAULT NULL,
  `dt_expedicao` varchar(45) DEFAULT NULL,
  `ds_uf_rg` varchar(2) DEFAULT NULL,
  `ds_org_exp` varchar(45) DEFAULT NULL,
  `ds_pis` varchar(45) DEFAULT NULL,
  `ds_titulo_eleitoral` varchar(45) DEFAULT NULL,
  `ds_zona_eleitoral` varchar(45) DEFAULT NULL,
  `ds_secao` varchar(45) DEFAULT NULL,
  `ds_certificado_reservista` varchar(45) DEFAULT NULL,
  `ic_filho_menor_14` int(11) DEFAULT NULL,
  `ds_nacionalidade` varchar(100) DEFAULT NULL,
  `grau_escolaridade_pk` int(11) DEFAULT NULL,
  `ds_matricula` varchar(20) DEFAULT NULL,
  `ic_reserva` int(11) DEFAULT NULL,
  `dt_admissao` date DEFAULT NULL,
  `dt_demissao` date DEFAULT NULL,
  `ds_naturalidade` varchar(25) DEFAULT NULL,
  `ic_origem` int(11) DEFAULT NULL,
  `qtde_filho` int(11) DEFAULT NULL,
  `empresas_pk` int(11) DEFAULT NULL,
  `regime_contratacao_pk` int(11) DEFAULT NULL,
  `ds_carga_horaria_semanal` varchar(45) DEFAULT NULL,
  `ds_entrada_dom` varchar(45) DEFAULT NULL,
  `ds_ida_intervalo_dom` varchar(45) DEFAULT NULL,
  `ds_volta_intervalo_dom` varchar(45) DEFAULT NULL,
  `ds_saida_dom` varchar(45) DEFAULT NULL,
  `ds_entrada_seg` varchar(45) DEFAULT NULL,
  `ds_ida_intervalo_seg` varchar(45) DEFAULT NULL,
  `ds_volta_intervalo_seg` varchar(45) DEFAULT NULL,
  `ds_saida_seg` varchar(45) DEFAULT NULL,
  `ds_entrada_ter` varchar(45) DEFAULT NULL,
  `ds_ida_intervalo_ter` varchar(45) DEFAULT NULL,
  `ds_volta_intervalo_ter` varchar(45) DEFAULT NULL,
  `ds_saida_ter` varchar(45) DEFAULT NULL,
  `ds_entrada_qua` varchar(45) DEFAULT NULL,
  `ds_ida_intervalo_qua` varchar(45) DEFAULT NULL,
  `ds_volta_intervalo_qua` varchar(45) DEFAULT NULL,
  `ds_saida_qua` varchar(45) DEFAULT NULL,
  `ds_entrada_qui` varchar(45) DEFAULT NULL,
  `ds_ida_intervalo_qui` varchar(45) DEFAULT NULL,
  `ds_volta_intervalo_qui` varchar(45) DEFAULT NULL,
  `ds_saida_qui` varchar(45) DEFAULT NULL,
  `ds_entrada_sex` varchar(45) DEFAULT NULL,
  `ds_ida_intervalo_sex` varchar(45) DEFAULT NULL,
  `ds_volta_intervalo_sex` varchar(45) DEFAULT NULL,
  `ds_saida_sex` varchar(45) DEFAULT NULL,
  `ds_entrada_sab` varchar(45) DEFAULT NULL,
  `ds_ida_intervalo_sab` varchar(45) DEFAULT NULL,
  `ds_volta_intervalo_sab` varchar(45) DEFAULT NULL,
  `ds_saida_sab` varchar(45) DEFAULT NULL,
  `tipo_conta_bancaria` int(11) DEFAULT NULL,
  `ds_agencia` varchar(45) DEFAULT NULL,
  `ds_conta` varchar(45) DEFAULT NULL,
  `ds_digito` varchar(45) DEFAULT NULL,
  `bancos_pk` int(11) DEFAULT NULL,
  `vl_salario` float DEFAULT NULL,
  `ds_n_sapato` varchar(12) DEFAULT NULL,
  `ds_n_camisa` varchar(12) DEFAULT NULL,
  `ds_n_calca` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `colaboradores`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores_beneficios`
--

CREATE TABLE `colaboradores_beneficios` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `vl_beneficio` float(11,2) DEFAULT NULL,
  `obs` text,
  `ic_status` int(11) DEFAULT NULL,
  `beneficios_pk` int(11) NOT NULL,
  `colaborador_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores_curso`
--

CREATE TABLE `colaboradores_curso` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `colaboradores_pk` int(11) DEFAULT NULL,
  `cursos_pk` int(11) DEFAULT NULL,
  `dt_execucao` date DEFAULT NULL,
  `dt_validacao` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores_exames`
--

CREATE TABLE `colaboradores_exames` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `usuario_cadastro_pk` int(11) DEFAULT NULL,
  `dt_ult_atualizacao` datetime DEFAULT NULL,
  `usuario_ult_atualizacao_pk` int(11) DEFAULT NULL,
  `exames_pk` int(11) DEFAULT NULL,
  `dt_prevista` date DEFAULT NULL,
  `dt_exame` date DEFAULT NULL,
  `ic_status` int(11) DEFAULT NULL,
  `obs` text,
  `colaborador_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores_faltas`
--

CREATE TABLE `colaboradores_faltas` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `motivo_falta_pk` int(11) NOT NULL,
  `obs` text,
  `colaborador_pk` int(11) NOT NULL,
  `dt_escala` date NOT NULL,
  `leads_pk` int(11) NOT NULL,
  `colaborador_reserva_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `colaboradores_faltas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores_hora_extra`
--

CREATE TABLE `colaboradores_hora_extra` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `colaborador_pk` int(11) NOT NULL,
  `leads_pk` int(11) NOT NULL,
  `dt_escala` date NOT NULL,
  `hr_extra_ini` varchar(45) NOT NULL,
  `hr_extra_fim` varchar(45) NOT NULL,
  `obs` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `colaboradores_hora_extra`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores_materiais`
--

CREATE TABLE `colaboradores_materiais` (
  `pk` int(11) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `usuario_cadastro_pk` int(11) DEFAULT NULL,
  `dt_ult_atualizacao` datetime DEFAULT NULL,
  `usuario_ult_atualizacao_pk` int(11) DEFAULT NULL,
  `tipo_material_pk` int(11) DEFAULT NULL,
  `material_pk` int(11) DEFAULT NULL,
  `qtde_material` int(11) DEFAULT NULL,
  `dt_entrega` int(11) DEFAULT NULL,
  `dt_devolucao` int(11) DEFAULT NULL,
  `obs` text,
  `colaborador_pk` int(11) DEFAULT NULL,
  `conjunto_material_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores_nome_filho`
--

CREATE TABLE `colaboradores_nome_filho` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `colaborador_pk` int(11) NOT NULL,
  `ds_nome_filho` varchar(100) DEFAULT NULL,
  `ds_cpf_filho` varchar(45) DEFAULT NULL,
  `dt_nascimento_filho` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores_produtos_servicos`
--

CREATE TABLE `colaboradores_produtos_servicos` (
  `colaboradores_pk` int(11) NOT NULL,
  `produtos_servicos_pk` int(11) NOT NULL,
  `ic_possui_treinamento` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Sim; 2 - Nao',
  `ic_possui_certificado` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Sim; 2 - Nao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `colaboradores_produtos_servicos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `fornecedor_pk` int(11) NOT NULL,
  `categoria_pk` int(11) NOT NULL,
  `conta_pk` int(11) NOT NULL,
  `dt_pagamento` date NOT NULL,
  `vl_pagamento` double(11,2) NOT NULL,
  `metodos_pagamento_pk` varchar(45) NOT NULL,
  `qtde_parcelas` int(11) DEFAULT NULL,
  `ds_numero_nota` varchar(100) NOT NULL,
  `ds_link_notafiscal` varchar(200) DEFAULT NULL,
  `dt_notafiscal` date DEFAULT NULL,
  `vl_notafiscal` double(11,2) NOT NULL,
  `vl_frete` double(11,2) DEFAULT NULL,
  `dt_entrega` date DEFAULT NULL,
  `ic_entregue` int(11) DEFAULT NULL,
  `obs` text,
  `grupo_lancamento_centro_custo_pk` int(11) DEFAULT NULL,
  `centro_custo_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras_solicitacao`
--

CREATE TABLE `compras_solicitacao` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `empresas_pk` int(11) DEFAULT NULL,
  `solicitante_pk` int(11) NOT NULL,
  `ds_compra_solicitacao` varchar(100) DEFAULT NULL,
  `dt_solicitacao` date NOT NULL,
  `obs_solicitacao` text,
  `usuario_aprovacao_pk` int(11) DEFAULT NULL,
  `dt_aprovacao` date DEFAULT NULL,
  `obs_aprovacao` text,
  `tipo_grupo_centro_custo_pk` int(11) DEFAULT NULL,
  `grupo_lancamento_centrocusto_pk` int(11) DEFAULT NULL,
  `ic_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras_solicitacao_orcamentos`
--

CREATE TABLE `compras_solicitacao_orcamentos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pl` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `fornecedor_pk` int(11) NOT NULL,
  `vl_total` double(11,2) DEFAULT NULL,
  `obs` text,
  `ic_status` int(11) DEFAULT NULL,
  `vl_frete` double(11,2) DEFAULT NULL,
  `dt_pevisao_entrega` date DEFAULT NULL,
  `compra_solicitacao_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras_solicitacao_orcamento_itens`
--

CREATE TABLE `compras_solicitacao_orcamento_itens` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `categorias_produto_pk` int(11) NOT NULL,
  `produtos_pk` int(11) NOT NULL,
  `qtde_produto` int(11) NOT NULL,
  `vl_unitario` double(11,2) NOT NULL,
  `compras_solicitacao_orcamentos_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conjunto_material`
--

CREATE TABLE `conjunto_material` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `colaborador_pk` int(11) DEFAULT NULL,
  `leads_pk` int(11) DEFAULT NULL,
  `ds_conjunto_material` varchar(45) DEFAULT NULL,
  `contratos_pk` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_tipo_pessoa` varchar(2) NOT NULL,
  `ds_conta` varchar(100) NOT NULL,
  `ds_razao_social` varchar(100) DEFAULT NULL,
  `ds_cpf_cnpj` varchar(20) DEFAULT NULL,
  `ds_cnae` varchar(45) DEFAULT NULL,
  `ds_rg` varchar(45) DEFAULT NULL,
  `ds_tel` varchar(14) DEFAULT NULL,
  `ds_cel` varchar(14) DEFAULT NULL,
  `ds_email` varchar(100) DEFAULT NULL,
  `ds_cep` varchar(12) NOT NULL,
  `ds_endereco` varchar(150) NOT NULL,
  `ds_numero` varchar(10) NOT NULL,
  `ds_complemento` varchar(45) DEFAULT NULL,
  `ds_bairro` varchar(80) NOT NULL,
  `ds_cidade` varchar(100) NOT NULL,
  `ds_uf` varchar(2) DEFAULT NULL,
  `dt_ativacao` datetime DEFAULT NULL,
  `dt_cancelamento` datetime DEFAULT NULL,
  `ic_status` int(11) NOT NULL,
  `id_cliente` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_bancarias`
--

CREATE TABLE `contas_bancarias` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_conta_bancaria` varchar(45) DEFAULT NULL,
  `ds_agencia` varchar(45) DEFAULT NULL,
  `ds_conta` varchar(45) DEFAULT NULL,
  `tipo_conta_pk` int(11) DEFAULT NULL,
  `vl_saldo_inicial` double(11,2) DEFAULT NULL,
  `ic_status` varchar(45) DEFAULT NULL,
  `bancos_pk` int(11) DEFAULT NULL,
  `empresas_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas_bancarias`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_contato` varchar(45) NOT NULL,
  `ds_cel` varchar(20) DEFAULT NULL,
  `ic_whatsapp` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Sim.; 2 - Nao',
  `ds_email` varchar(100) DEFAULT NULL,
  `ds_tel` varchar(20) DEFAULT NULL,
  `cargos_pk` int(11) DEFAULT NULL,
  `leads_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

CREATE TABLE `contratos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `dt_inicio_contrato` date NOT NULL,
  `dt_fim_contrato` date DEFAULT NULL,
  `processos_etapas_pk` int(11) NOT NULL,
  `ic_tipo_contrato` int(11) NOT NULL DEFAULT '1' COMMENT '1 - Contrato; 2 - Aditivo',
  `dt_recisao_contrato` date DEFAULT NULL,
  `contratos_pk` int(11) DEFAULT NULL COMMENT 'este campo será preenchido quando o contrato for um aditivo, assim sera selecionado o contrato pai.',
  `dt_cancelamento` datetime DEFAULT NULL,
  `ds_obs_motivo_cancelamento` varchar(45) DEFAULT NULL,
  `empresas_pk` int(11) DEFAULT NULL,
  `ic_lancar_financeiro` int(11) DEFAULT NULL,
  `qtde_parcelas_pk` int(11) DEFAULT NULL,
  `vl_total_mao_obra` double(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contratos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos_itens`
--

CREATE TABLE `contratos_itens` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `n_qtde` int(11) NOT NULL,
  `vl_unit` double(11,2) DEFAULT NULL,
  `vl_total` double(11,2) NOT NULL,
  `contratos_pk` int(11) NOT NULL,
  `produtos_servicos_pk` int(11) NOT NULL,
  `n_qtde_dias_semana` varchar(25) NOT NULL,
  `periodo` int(11) DEFAULT NULL,
  `vl_mao_obra` double(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contratos_itens`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos_produtos_itens`
--

CREATE TABLE `contratos_produtos_itens` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `categorias_produto_pk` int(11) NOT NULL,
  `produtos_pk` int(11) NOT NULL,
  `n_qtde_item` int(11) NOT NULL,
  `vl_item_produto` double(11,2) DEFAULT NULL,
  `contratos_pk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato_dados_faturamento`
--

CREATE TABLE `contrato_dados_faturamento` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `metodos_pagamento_pk` int(11) NOT NULL,
  `num_parcela` int(11) NOT NULL,
  `dt_pagamento` date NOT NULL,
  `vl_servico` double(11,2) NOT NULL,
  `contratos_pk` int(11) NOT NULL,
  `dt_faturamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_curso` varchar(100) NOT NULL,
  `ic_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_curso`, `ic_status`) VALUES
(1, '2020-12-02 10:34:49', 1, '2020-12-02 10:37:54', 1, 'Exame Adminissional', 1),
(2, '2020-12-02 10:38:04', 1, '2020-12-02 10:38:04', 1, 'Periódico de Bombeiro', 1),
(3, '2020-12-02 10:38:54', 1, '2020-12-02 10:38:54', 1, 'Reciclagem NR10', 1),
(4, '2020-12-02 10:39:10', 1, '2020-12-02 10:39:10', 1, 'Reciclagem NR20', 1),
(5, '2020-12-02 10:39:21', 1, '2020-12-02 10:39:21', 1, 'Reciclagem NR33', 1),
(6, '2020-12-02 10:39:40', 1, '2020-12-02 10:39:40', 1, 'Reciclagem NR35', 1),
(7, '2020-12-02 10:39:54', 1, '2020-12-02 10:39:54', 1, 'Reciclagem DEA', 1),
(8, '2020-12-02 10:40:20', 1, '2020-12-02 10:40:20', 1, 'Reciclagem Heliponto', 1),
(9, '2020-12-02 10:54:53', 1, '2020-12-02 10:54:53', 1, 'Reciclagem Vigilante', 1),
(10, '2020-12-02 11:02:01', 1, '2020-12-02 11:02:01', 1, 'CNV', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dias_semana`
--

CREATE TABLE `dias_semana` (
  `pk` int(11) NOT NULL,
  `ds_dia_semana` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dias_semana`
--

INSERT INTO `dias_semana` (`pk`, `ds_dia_semana`) VALUES
(1, 'Dom'),
(2, 'Seg'),
(3, 'Ter'),
(4, 'Qua'),
(5, 'Qui'),
(6, 'Sex'),
(7, 'Sab');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_documento` varchar(200) DEFAULT NULL,
  `ds_obs` varchar(200) DEFAULT NULL,
  `ds_nome_original` varchar(200) DEFAULT NULL,
  `colaboradores_pk` int(11) DEFAULT NULL,
  `leads_pk` int(11) DEFAULT NULL,
  `contratos_pk` int(11) DEFAULT NULL,
  `ocorrencias_pk` int(11) DEFAULT NULL,
  `agenda_colaborador_tarefa_pk` int(11) DEFAULT NULL,
  `lancamentos_pk` int(11) DEFAULT NULL,
  `compras_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `documentos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_estoque`
--

CREATE TABLE `entrada_estoque` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `obs_entrada_estoque` text,
  `fornecedor_pk` int(11) DEFAULT NULL,
  `produtos_pk` int(11) NOT NULL,
  `ds_n_ordem` varchar(20) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `vl_unitario` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entrada_estoque`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes`
--

CREATE TABLE `equipes` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_equipe` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `equipes`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes_usuarios`
--

CREATE TABLE `equipes_usuarios` (
  `equipes_pk` int(11) NOT NULL,
  `usuarios_pk` int(11) NOT NULL,
  `ic_bko` int(11) DEFAULT NULL,
  `ic_supervisor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE `fatura` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `leads_pk` int(11) NOT NULL,
  `dt_inicio_fatura` date NOT NULL,
  `dt_fim_fatura` date NOT NULL,
  `vl_bruto_total` float DEFAULT NULL,
  `vl_falta` float DEFAULT NULL,
  `qtde_falta` int(11) DEFAULT NULL,
  `dt_cancelamento` datetime DEFAULT NULL,
  `ds_descricao_cancelamento` varchar(100) DEFAULT NULL,
  `empresas_pk` int(11) DEFAULT NULL,
  `tipo_contrato_pk` int(11) DEFAULT NULL,
  `vl_inss` float DEFAULT '0',
  `vl_issqn` float DEFAULT '0',
  `vl_total_fatura` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formulario`
--

CREATE TABLE `formulario` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_formulario` varchar(45) DEFAULT NULL,
  `ds_link` varchar(100) DEFAULT NULL,
  `ic_status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formulario`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_fornecedor` varchar(150) DEFAULT NULL,
  `ds_ddd` varchar(2) DEFAULT NULL,
  `ds_tel` varchar(20) DEFAULT NULL,
  `ds_email` varchar(100) DEFAULT NULL,
  `ic_status` int(11) DEFAULT NULL,
  `categorias_produto_pk` int(11) DEFAULT NULL,
  `ds_cpf_cnpj` varchar(45) DEFAULT NULL,
  `ds_razao_social` varchar(45) DEFAULT NULL,
  `ds_endereco` varchar(45) DEFAULT NULL,
  `ds_numero` varchar(45) DEFAULT NULL,
  `ds_complemento` varchar(45) DEFAULT NULL,
  `ds_bairro` varchar(45) DEFAULT NULL,
  `ds_cidade` varchar(45) DEFAULT NULL,
  `ds_uf` varchar(45) DEFAULT NULL,
  `ds_cep` varchar(45) DEFAULT NULL,
  `ds_contato` varchar(45) DEFAULT NULL,
  `tipo_conta_bancaria` int(11) DEFAULT NULL,
  `ds_agencia` varchar(45) DEFAULT NULL,
  `ds_conta` varchar(45) DEFAULT NULL,
  `ds_digito` varchar(45) DEFAULT NULL,
  `bancos_pk` int(11) DEFAULT NULL,
  `vl_salario` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `generos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_grupo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_fatura`
--

CREATE TABLE `itens_fatura` (
  `pk` int(11) NOT NULL,
  `tipo_item_fatura` int(11) NOT NULL,
  `vl_total` float DEFAULT NULL,
  `fatura_pk` int(11) NOT NULL,
  `ds_descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancamentos`
--

CREATE TABLE `lancamentos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `dt_vencimento` date NOT NULL,
  `ds_lancamento` varchar(100) NOT NULL,
  `vl_lancamento` double(11,2) NOT NULL,
  `operacao_pk` int(11) NOT NULL,
  `tipo_grupo_pk` int(11) NOT NULL,
  `grupo_leancamento_pk` int(11) DEFAULT NULL,
  `ic_status_pagamento` int(11) NOT NULL,
  `obs_lancamento` text,
  `dt_competencia` date DEFAULT NULL,
  `n_documento` varchar(200) DEFAULT NULL,
  `tipos_operacao_pk` int(11) NOT NULL,
  `metodos_pagamento_pk` int(11) NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `contas_bancarias_pk` int(11) DEFAULT NULL,
  `empresas_pk` int(11) DEFAULT NULL,
  `tipo_grupo_centro_custo_pk` int(11) DEFAULT NULL,
  `grupo_lancamento_centro_custo_pk` int(11) DEFAULT NULL,
  `ds_ocorrencia` varchar(45) DEFAULT NULL,
  `dt_pagamento` datetime DEFAULT NULL,
  `contratos_pk` int(11) DEFAULT NULL,
  `compras_pk` int(11) DEFAULT NULL,
  `dt_faturamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lancamentos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `leads`
--

CREATE TABLE `leads` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_lead` varchar(100) NOT NULL,
  `ds_razao_social` varchar(100) DEFAULT NULL,
  `ds_cpf_cnpj` varchar(20) DEFAULT NULL,
  `ds_ie` varchar(20) DEFAULT NULL,
  `ds_endereco` varchar(100) NOT NULL,
  `ds_complemento` varchar(10) DEFAULT NULL,
  `ds_numero` varchar(10) DEFAULT NULL,
  `ds_cep` varchar(9) DEFAULT NULL,
  `ds_bairro` varchar(45) DEFAULT NULL,
  `ds_cidade` varchar(45) DEFAULT NULL,
  `ds_uf` varchar(2) DEFAULT NULL,
  `ic_cliente` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Sim; 2 - Nao',
  `n_qtde_torres` int(11) DEFAULT NULL,
  `ds_obs` longtext,
  `ds_tel` varchar(20) DEFAULT NULL,
  `ds_fax` varchar(20) DEFAULT NULL,
  `ds_site` varchar(80) DEFAULT NULL,
  `ds_email` varchar(80) DEFAULT NULL,
  `supervisores_pk` int(11) DEFAULT NULL,
  `responsavel_pk` int(11) DEFAULT NULL,
  `segmentos_pk` int(11) DEFAULT NULL,
  `ic_qrcode_posto` int(11) DEFAULT NULL,
  `dt_vencimento` date DEFAULT NULL,
  `ic_tipo_lead` int(11) DEFAULT NULL,
  `leads_pai_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `leads`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `leads_desconto`
--

CREATE TABLE `leads_desconto` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_desconto` varchar(100) NOT NULL,
  `dt_base` date DEFAULT NULL,
  `vl_desconto` float(11,2) DEFAULT NULL,
  `leads_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leads_impostos`
--

CREATE TABLE `leads_impostos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_percentual_imposto` decimal(10,2) NOT NULL,
  `imposto_pk` int(11) DEFAULT NULL,
  `leads_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_exclusao`
--

CREATE TABLE `log_exclusao` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `ds_modulo` varchar(150) NOT NULL,
  `pk_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `log_exclusao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `metodos_pagamento`
--

CREATE TABLE `metodos_pagamento` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_metodo_pagamento` varchar(150) NOT NULL,
  `ic_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `metodos_pagamento`
--

INSERT INTO `metodos_pagamento` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_metodo_pagamento`, `ic_status`) VALUES
(1, '2020-11-16 10:00:00', 1, '2020-11-16 10:00:00', 1, 'Dinheiro', 1),
(2, '2020-11-16 10:00:00', 1, '2020-11-16 10:00:00', 1, 'Transferência', 1),
(3, '2020-11-16 10:00:00', 1, '2020-11-16 10:00:00', 1, 'Débito em Conta', 1),
(4, '2020-11-16 10:00:00', 1, '2020-11-16 10:00:00', 1, 'Cartão de Débito', 1),
(5, '2021-07-19 17:39:29', 1, '2021-07-19 17:39:29', 1, 'Boleto', 1),
(9, '2022-02-20 20:52:39', 1, '2022-02-20 20:52:39', 1, 'PIX', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE `modulos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_modulo` varchar(45) NOT NULL,
  `ds_dominio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_modulo`, `ds_dominio`) VALUES
(1, '2019-06-14 16:41:02', 1, '2019-06-14 16:41:02', 1, 'Administração -> Módulos', 'modulo'),
(2, '2019-06-14 16:41:13', 1, '2019-06-14 16:41:13', 1, 'Administração -> Grupos', 'grupo'),
(3, '2019-06-14 16:41:31', 1, '2019-06-14 16:41:31', 1, 'Administração -> Usuários', 'usuario'),
(4, '2019-06-14 16:41:44', 1, '2019-06-14 16:41:44', 1, 'Administração', 'administracao'),
(5, '2019-09-24 14:22:06', 1, '2019-09-24 14:22:06', 1, 'Cadastro -> Cargos', 'cargo'),
(6, '2019-09-24 14:22:24', 1, '2019-09-24 14:22:24', 1, 'Cadastro -> Motivo Pausa', 'motivo_pausa'),
(7, '2019-09-24 14:22:44', 1, '2019-09-24 14:22:44', 1, 'Cadastro -> Equipe', 'equipe'),
(8, '2019-09-24 14:23:17', 1, '2019-09-24 14:23:17', 1, 'Cadastro -> Gênero', 'genero'),
(9, '2019-09-24 14:23:37', 1, '2019-09-24 14:23:37', 1, 'Cadastro -> Produtos Serviços', 'produto_servico'),
(10, '2019-09-24 14:23:57', 1, '2019-09-24 14:23:57', 1, 'Cadastro -> Processo Default', 'processo_default'),
(11, '2019-09-24 14:24:28', 1, '2019-09-24 14:24:28', 1, 'Cadastro -> Tipo Ocorrências', 'tipo_ocorrencia'),
(12, '2019-09-25 11:34:52', 3, '2019-09-25 11:34:52', 3, 'Cadastro', 'cadastro'),
(13, '2019-09-25 11:35:33', 3, '2019-09-25 11:35:33', 3, 'Operação', 'operacao'),
(14, '2019-09-25 11:35:53', 3, '2019-09-25 11:35:53', 3, 'Operação -> Leads', 'lead'),
(15, '2019-09-25 11:36:11', 3, '2019-09-25 11:36:11', 3, 'Operação -> Ocorrências', 'ocorrencia'),
(16, '2019-09-25 11:36:34', 3, '2019-09-25 11:36:34', 3, 'Operação -> Colaboradores', 'colaborador'),
(17, '2019-09-25 11:36:58', 3, '2019-09-25 11:36:58', 3, 'Operação -> Agenda do Condomínio', 'agenda_condominio'),
(18, '2019-09-25 11:37:43', 3, '2019-09-25 11:37:43', 3, 'Operação -> Agenda do Colaborador', 'agenda_colaborador'),
(19, '2019-09-25 11:38:04', 3, '2019-09-25 11:38:04', 3, 'Operação -> Agenda de Retorno', 'agenda_retorno'),
(20, '2019-09-25 11:38:53', 3, '2019-09-25 11:38:53', 3, 'Operação -> Leads -> Processo', 'processo'),
(21, '2019-09-25 11:39:19', 3, '2019-09-25 11:39:19', 3, 'Operação -> Leads -> Documentos', 'documento'),
(22, '2019-09-25 12:48:16', 1, '2019-09-25 12:48:16', 1, 'Relatórios -> Conciliação por Condomínio', 'rel_condominio'),
(23, '2019-09-25 12:48:38', 1, '2019-09-25 12:48:38', 1, 'Relatórios -> Conciliação por Colaborador', 'rel_colaborador'),
(24, '2019-09-25 12:49:03', 1, '2019-09-25 12:49:03', 1, 'Relatórios -> Lista de Autorização', 'lista_autorizacao'),
(25, '2020-09-14 11:25:29', 1, '2020-09-14 11:25:29', 1, 'Menu - > Operacional', 'menu_operacional'),
(26, '2020-09-14 11:25:42', 1, '2020-09-14 11:25:42', 1, 'Menu -> Cadastros', 'menu_cadastros'),
(27, '2020-09-14 11:25:58', 1, '2020-09-14 11:25:58', 1, 'Menu -> Financeiro', 'menu_financeiro'),
(28, '2020-09-14 11:26:20', 1, '2020-09-14 11:26:20', 1, 'Menu -> Relatórios', 'menu_relatorios'),
(29, '2020-09-14 11:26:34', 1, '2020-09-14 11:26:34', 1, 'Menu -> Administração', 'menu_administracao'),
(30, '2020-09-14 11:26:46', 1, '2020-09-14 11:26:46', 1, 'Menu -> Cpainel', 'menu_cpainel'),
(31, '2020-11-30 12:00:23', 1, '2020-11-30 12:00:23', 1, 'Menu -> Tarefas', 'menu_tarefas'),
(32, '2020-11-30 12:01:20', 1, '2020-11-30 12:01:20', 1, 'Menu -> Ocorrências', 'menu_ocorrencias'),
(64, '2021-05-28 10:00:00', 1, '2021-05-28 10:00:00', 1, 'Menu -> Colaboradores', 'menu_colaboradores'),
(100, '2021-07-19 17:40:01', 1, '2021-07-19 17:40:01', 1, 'Financeiro Saldo', 'visualizar_saldo_conta'),
(101, '2021-07-19 17:40:01', 1, '2021-07-19 17:40:01', 1, 'Financeiro Lançamentos', 'excluir_lancamentos'),
(102, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Contas Bancarias', 'contas_bancarias'),
(103, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Plano Contas', 'plano_contas'),
(104, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Excluir Lancamento Pago', 'excluir_lancamentos_pagos'),
(105, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Editar Lancamento Pago', 'editar_lancamentos_pagos'),
(107, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Status Pago', 'status_finaceiro'),
(108, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Exibir Extrato', 'exibir_extrato'),
(109, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Exibir Gráfico', 'exibir_grafico_lancamento'),
(110, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Contrato', 'contrato'),
(111, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Grid Receita Dia', 'grid_receita_dia'),
(112, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Grid Despesa Dia', 'grid_despesa_dia'),
(113, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Grid Receita Atrasa', 'grid_receita_atrasado'),
(114, '2021-08-09 16:44:42', 1, '2021-08-09 16:44:42', 1, 'Financeiro - Grid Despesa Atrasa', 'grid_receita_atrasado'),
(115, '2021-08-09 16:44:46', 1, '2021-08-09 16:44:46', 1, 'Financeiro - Grid Lancamento', 'grid_lancamento_mes'),
(116, '2021-08-09 16:44:54', 1, '2021-08-09 16:44:54', 1, 'Financeiro - Tipo Lançamento Caixinha', 'tipo_lancamento_caixinha'),
(117, '2021-11-18 11:20:44', 1, '2021-11-18 11:20:44', 1, 'Menu -> RH', 'menu_rh');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos_grupos`
--

CREATE TABLE `modulos_grupos` (
  `modulos_pk` int(11) NOT NULL,
  `grupos_pk` int(11) NOT NULL,
  `ic_ins` int(11) DEFAULT '2' COMMENT '1 - Sim; 2 - Nao',
  `ic_upd` int(11) DEFAULT '2' COMMENT '1 - Sim; 2 - Nao',
  `ic_del` int(11) DEFAULT '2' COMMENT '1 - Sim; 2 - Nao',
  `ic_cons` int(11) DEFAULT '2' COMMENT '1 - Sim; 2 - Nao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modulos_grupos`
--

INSERT INTO `modulos_grupos` (`modulos_pk`, `grupos_pk`, `ic_ins`, `ic_upd`, `ic_del`, `ic_cons`) VALUES
(1, 1, 1, 1, 1, 1),
(1, 2, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1),
(3, 1, 1, 1, 1, 1),
(3, 2, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1),
(4, 2, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1),
(5, 2, 1, 1, 1, 1),
(5, 6, 1, 1, 1, 1),
(6, 1, 1, 1, 1, 1),
(6, 2, 1, 1, 1, 1),
(6, 6, 1, 1, 1, 1),
(7, 1, 1, 1, 1, 1),
(7, 2, 1, 1, 1, 1),
(7, 6, 1, 1, 1, 1),
(8, 1, 1, 1, 1, 1),
(8, 2, 1, 1, 1, 1),
(8, 6, 1, 1, 1, 1),
(9, 1, 1, 1, 1, 1),
(9, 2, 1, 1, 1, 1),
(9, 6, 1, 1, 1, 1),
(10, 1, 1, 1, 1, 1),
(10, 2, 1, 1, 1, 1),
(10, 6, 1, 1, 1, 1),
(11, 1, 1, 1, 1, 1),
(11, 2, 1, 1, 1, 1),
(11, 6, 1, 1, 1, 1),
(12, 1, 1, 1, 1, 1),
(12, 2, 1, 1, 1, 1),
(13, 1, 1, 1, 1, 1),
(13, 2, 1, 1, 1, 1),
(13, 3, 1, 1, 1, 1),
(13, 6, 1, 1, 1, 1),
(14, 1, 1, 1, 1, 1),
(14, 2, 1, 1, 1, 1),
(14, 3, 1, 1, 1, 1),
(14, 6, 1, 1, 1, 1),
(15, 1, 1, 1, 1, 1),
(15, 2, 1, 1, 1, 1),
(15, 3, 1, 1, 1, 1),
(15, 6, 1, 1, 1, 1),
(16, 1, 1, 1, 1, 1),
(16, 2, 1, 1, 1, 1),
(16, 3, 1, 1, 1, 1),
(16, 5, 1, 1, 1, 1),
(16, 6, 1, 1, 1, 1),
(17, 1, 1, 1, 1, 1),
(17, 2, 1, 1, 1, 1),
(17, 3, 1, 1, 1, 1),
(17, 6, 1, 1, 1, 1),
(18, 1, 1, 1, 1, 1),
(18, 2, 1, 1, 1, 1),
(18, 3, 1, 1, 1, 1),
(18, 6, 1, 1, 1, 1),
(19, 1, 1, 1, 1, 1),
(19, 2, 1, 1, 1, 1),
(19, 3, 1, 1, 1, 1),
(19, 6, 1, 1, 1, 1),
(20, 1, 1, 1, 1, 1),
(20, 2, 1, 1, 1, 1),
(20, 3, 1, 1, 1, 1),
(20, 6, 1, 1, 1, 1),
(21, 1, 1, 1, 1, 1),
(21, 2, 1, 1, 1, 1),
(21, 3, 1, 1, 1, 1),
(21, 6, 1, 1, 1, 1),
(22, 1, 1, 1, 1, 1),
(22, 2, 1, 1, 1, 1),
(22, 6, 1, 1, 1, 1),
(23, 1, 1, 1, 1, 1),
(23, 2, 1, 1, 1, 1),
(23, 6, 1, 1, 1, 1),
(24, 1, 1, 1, 1, 1),
(24, 2, 1, 1, 1, 1),
(24, 6, 1, 1, 1, 1),
(25, 1, 1, 1, 1, 1),
(25, 2, 1, 1, 1, 1),
(25, 3, 1, 1, 1, 1),
(25, 6, 1, 1, 1, 1),
(26, 1, 1, 1, 1, 1),
(26, 2, 1, 1, 1, 1),
(26, 6, 1, 1, 1, 1),
(27, 1, 1, 1, 1, 1),
(27, 2, 1, 1, 1, 1),
(28, 1, 1, 1, 1, 1),
(28, 2, 1, 1, 1, 1),
(28, 6, 1, 1, 1, 1),
(29, 1, 1, 1, 1, 1),
(29, 2, 1, 1, 1, 1),
(30, 1, 1, 1, 1, 1),
(31, 4, 1, 1, 1, 1),
(32, 5, 1, 1, 1, 1),
(64, 5, 1, 1, 1, 1),
(100, 1, 1, 1, 1, 1),
(101, 1, 1, 1, 1, 1),
(102, 1, 1, 1, 1, 1),
(103, 1, 1, 1, 1, 1),
(104, 1, 1, 1, 1, 1),
(105, 1, 1, 1, 1, 1),
(107, 1, 1, 1, 1, 1),
(108, 1, 1, 1, 1, 1),
(109, 1, 1, 1, 1, 1),
(110, 1, 1, 1, 1, 1),
(111, 1, 1, 1, 1, 1),
(112, 1, 1, 1, 1, 1),
(113, 1, 1, 1, 1, 1),
(114, 1, 1, 1, 1, 1),
(115, 1, 1, 1, 1, 1),
(116, 1, 1, 1, 1, 1),
(117, 1, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivos_pausas`
--

CREATE TABLE `motivos_pausas` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_motivo_pausa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `motivos_pausas`
--

INSERT INTO `motivos_pausas` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_motivo_pausa`) VALUES
(1, '2019-07-10 14:49:00', 1, '2019-07-30 16:50:40', 1, 'Substituição Agenda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivo_alteracao_escala`
--

CREATE TABLE `motivo_alteracao_escala` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_motivo_alteracao_escala` varchar(200) NOT NULL,
  `ic_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `motivo_alteracao_escala`
--

INSERT INTO `motivo_alteracao_escala` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_motivo_alteracao_escala`, `ic_status`) VALUES
(1, '2020-08-22 12:24:50', 1, '2020-08-22 12:24:50', 1, 'Motivos de Saúde', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao_estoque`
--

CREATE TABLE `movimentacao_estoque` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `leads_pk` int(11) DEFAULT NULL,
  `colaborador_pk` int(11) DEFAULT NULL,
  `produtos_itens_pk` int(11) NOT NULL,
  `qtde` int(11) DEFAULT NULL,
  `obs_movimentacao` text,
  `dt_entrega` date DEFAULT NULL,
  `dt_devolucao` date DEFAULT NULL,
  `conjunto_material_pk` int(11) DEFAULT NULL,
  `ic_mateiral_carga` int(11) DEFAULT NULL,
  `polos_origem_pk` int(11) DEFAULT NULL,
  `polos_destino_pk` int(11) DEFAULT NULL,
  `grupo_para_movimentacao_pk` int(11) DEFAULT NULL,
  `contratos_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias`
--

CREATE TABLE `ocorrencias` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_ocorrencia` longtext NOT NULL,
  `tipos_ocorrencias_pk` int(11) NOT NULL,
  `processos_etapas_pk` int(11) DEFAULT NULL,
  `dt_fechamento` datetime DEFAULT NULL,
  `leads_pk` int(11) DEFAULT NULL,
  `dt_prazo_execucao` date DEFAULT NULL,
  `ic_recusa` int(11) DEFAULT NULL,
  `clientes_pk` int(11) DEFAULT NULL,
  `obs_execucao` text,
  `obs_recusa` text CHARACTER SET latin1,
  `dt_visualizacao` datetime DEFAULT NULL,
  `colaborador_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ocorrencias`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE `ponto` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) DEFAULT NULL,
  `ds_pin` varchar(45) DEFAULT NULL,
  `colaborador_pk` int(11) DEFAULT NULL,
  `tipo_ponto_pk` int(11) DEFAULT NULL,
  `dt_hora_ponto` datetime DEFAULT NULL,
  `ds_localizacao` varchar(200) DEFAULT NULL,
  `ds_imagem` varchar(200) DEFAULT NULL,
  `ponto_origem_pk` int(11) DEFAULT NULL,
  `ic_dispositivo` int(11) DEFAULT '2',
  `ic_status_conferencia` int(11) DEFAULT NULL,
  `ds_total_horas_trabalhadas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ponto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto_folha`
--

CREATE TABLE `ponto_folha` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `colaborador_pk` int(11) DEFAULT NULL,
  `dt_periodo_ini` date NOT NULL,
  `dt_periodo_fim` date NOT NULL,
  `obs` text,
  `leads_pk` int(11) DEFAULT NULL,
  `dt_cancelamento` datetime DEFAULT NULL,
  `obs_cancelamento` text,
  `empresas_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ponto_folha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto_folha_colaborador`
--

CREATE TABLE `ponto_folha_colaborador` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `colaborador_pk` int(11) NOT NULL,
  `ponto_folha_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ponto_folha_colaborador`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto_folha_registros`
--

CREATE TABLE `ponto_folha_registros` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ponto_pk` int(11) DEFAULT NULL,
  `tipo_ponto_pk` int(11) DEFAULT NULL,
  `dt_hora_ponto` datetime DEFAULT NULL,
  `ponto_folha_pk` int(11) NOT NULL,
  `colaborador_pk` int(11) DEFAULT NULL,
  `hr_ini_expediente` time DEFAULT NULL,
  `hr_ini_intervalo` time DEFAULT NULL,
  `hr_fim_intervalo` time DEFAULT NULL,
  `hr_fim_expediente` time DEFAULT NULL,
  `hr_trabalhadas` time DEFAULT NULL,
  `hr_excedente` time DEFAULT NULL,
  `hr_faltantes` time DEFAULT NULL,
  `hr_extra50` time DEFAULT NULL,
  `hr_extra100` time DEFAULT NULL,
  `hr_adicional_noturno` time DEFAULT NULL,
  `hr_saldo` time DEFAULT NULL,
  `situacao_pk` int(11) DEFAULT NULL,
  `obs` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ponto_folha_registros`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto_solicitacao_liberacao_app`
--

CREATE TABLE `ponto_solicitacao_liberacao_app` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_pin` varchar(45) NOT NULL,
  `colaborador_pk` int(11) NOT NULL,
  `ds_imagem` varchar(200) NOT NULL,
  `id_cliente` varchar(45) NOT NULL,
  `dt_solit_liberacao` datetime NOT NULL,
  `ds_aparelho` varchar(200) DEFAULT NULL,
  `usuario_aprovacao_pk` int(11) DEFAULT NULL,
  `obs` text,
  `ic_status` int(11) DEFAULT NULL,
  `dt_liberacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ponto_solicitacao_liberacao_app`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos`
--

CREATE TABLE `processos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_processo` varchar(45) NOT NULL,
  `processos_default_pk` int(11) NOT NULL,
  `leads_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `processos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos_default`
--

CREATE TABLE `processos_default` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_processo_default` varchar(45) NOT NULL,
  `ic_status` int(11) NOT NULL DEFAULT '2' COMMENT '1 = Ativo; 2 - Inatvio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `processos_default`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `processos_default_etapas`
--

CREATE TABLE `processos_default_etapas` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_processo_default_etapa` varchar(45) NOT NULL,
  `n_ordem_etapa` int(11) NOT NULL,
  `processos_default_pk` int(11) NOT NULL,
  `equipes_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `processos_default_etapas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `processos_etapas`
--

CREATE TABLE `processos_etapas` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_processo_etapa` varchar(45) NOT NULL,
  `n_ordem_etapa` int(11) NOT NULL,
  `processos_pk` int(11) NOT NULL,
  `dt_fim` datetime DEFAULT NULL,
  `equipes_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `processos_etapas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_produto` varchar(150) NOT NULL,
  `obs` text,
  `ic_status` int(11) NOT NULL,
  `categorias_produto_pk` int(11) NOT NULL,
  `tipo_unidade_pk` int(11) DEFAULT NULL,
  `ic_tempo_troca` int(11) DEFAULT NULL,
  `qtde_minima` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_itens`
--

CREATE TABLE `produtos_itens` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_n_serie` varchar(45) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `vl_item` float(11,2) DEFAULT NULL,
  `produtos_pk` int(11) NOT NULL,
  `entrada_estoque_pk` int(11) DEFAULT NULL,
  `dt_baixa` date DEFAULT NULL,
  `obs_baixa` text,
  `usuario_baixa_pk` int(11) DEFAULT NULL,
  `ds_identificacao` varchar(100) DEFAULT NULL,
  `polos_pk` int(11) DEFAULT NULL,
  `dt_cancelamento` datetime DEFAULT NULL,
  `ds_motivo_cancelamento` text,
  `compras_pk` int(11) DEFAULT NULL,
  `ic_entrega` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos_itens`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_saida`
--

CREATE TABLE `produtos_saida` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_alteracao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `produto_saidacol` varchar(45) DEFAULT NULL,
  `leads_pk` int(11) DEFAULT NULL,
  `colaborador_pk` int(11) DEFAULT NULL,
  `produtos_itens_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_servicos`
--

CREATE TABLE `produtos_servicos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_produto_servico` varchar(45) NOT NULL,
  `ds_obs` text,
  `ic_status` int(11) DEFAULT NULL,
  `ds_cbo` varchar(20) DEFAULT NULL,
  `polos_pk` int(11) DEFAULT NULL,
  `tipos_unidades_pk` int(11) DEFAULT NULL,
  `fornecedor_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_servicos`
--

INSERT INTO `produtos_servicos` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_produto_servico`, `ds_obs`, `ic_status`, `ds_cbo`, `polos_pk`, `tipos_unidades_pk`, `fornecedor_pk`) VALUES
(2, '2019-07-10 15:09:57', 1, '2020-09-10 17:23:30', 1, 'Agente de Asseio', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2019-07-25 11:22:27', 1, '2020-09-10 16:31:08', 1, 'Auxiliar Administrativo', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2019-08-12 15:38:55', 1, '2020-09-10 16:15:20', 1, 'Auxiliar de Limpeza', NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2020-05-05 16:31:23', 1, '2020-09-10 16:15:00', 1, 'Auxiliar de ServiÃ§o Gerais', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2020-08-11 12:00:54', 1, '2020-09-10 16:14:34', 1, 'Controlador de Acesso', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2020-08-25 10:47:22', 1, '2020-09-10 16:12:46', 1, 'Porteiro', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2020-09-10 16:12:27', 1, '2020-09-10 16:12:27', 1, 'Zelador', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2020-12-28 09:22:57', 13, '2020-12-28 09:22:57', 13, 'Lider de Limpeza', NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2020-12-28 14:25:19', 13, '2020-12-28 14:25:19', 13, 'Limpador de Vidros', NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2020-12-28 14:26:53', 13, '2020-12-28 14:26:53', 13, 'Jardineiro', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `propostas`
--

CREATE TABLE `propostas` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `n_versao` int(11) NOT NULL,
  `tipo_segmento_pk` int(11) DEFAULT NULL,
  `responsavel_pk` int(11) DEFAULT NULL,
  `dt_envio` date DEFAULT NULL,
  `dt_previsao_fechamento` date DEFAULT NULL,
  `dt_fechamento` date DEFAULT NULL,
  `dt_validade` date NOT NULL,
  `dt_cancelamento` datetime DEFAULT NULL,
  `ds_obs_motivo_cancelamento` longtext,
  `motivo_cancelamento_pk` varchar(45) DEFAULT NULL,
  `agendas_pk` int(11) DEFAULT NULL,
  `ds_obs` longtext,
  `operador_pk` varchar(45) DEFAULT NULL,
  `leads_pk` int(11) NOT NULL,
  `vl_total` double(11,2) NOT NULL,
  `processos_etapas_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `propostas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `propostas_itens`
--

CREATE TABLE `propostas_itens` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `produtos_servicos_pk` int(11) NOT NULL,
  `n_qtde` int(11) NOT NULL,
  `vl_unit` double(11,2) NOT NULL,
  `vl_total` double(11,2) NOT NULL,
  `propostas_pk` int(11) NOT NULL,
  `n_qtde_dias_semana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `propostas_itens`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `retornos`
--

CREATE TABLE `retornos` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) DEFAULT NULL,
  `dt_retorno` datetime DEFAULT NULL,
  `equipes_pk` int(11) DEFAULT NULL,
  `responsavel_pk` int(11) DEFAULT NULL,
  `dt_termino_retorno` datetime DEFAULT NULL,
  `ds_retorno` text,
  `ocorrencias_pk` int(11) NOT NULL,
  `tipo_lembrete_pk` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `retornos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_ocorrencias`
--

CREATE TABLE `tipos_ocorrencias` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_tipo_ocorrencia` varchar(45) NOT NULL,
  `ic_fechar_ocorrencia_auto` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Sim; 2 - Nao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipos_ocorrencias`
--

INSERT INTO `tipos_ocorrencias` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_tipo_ocorrencia`, `ic_fechar_ocorrencia_auto`) VALUES
(1, '2019-09-12 15:37:15', 1, '2019-09-12 15:37:15', 1, 'Troca de Colaborador', 2),
(2, '2019-09-12 15:37:44', 1, '2019-09-12 15:37:44', 1, 'Cadastro de novo colaborador na Agenda', 1),
(5, '2020-05-08 09:50:34', 1, '2020-05-08 09:50:34', 1, 'Visita Tecnica', 2),
(6, '2020-05-29 12:35:48', 1, '2020-05-29 12:35:48', 1, 'Avaliação', 2),
(7, '2020-08-04 10:22:38', 1, '2020-08-04 10:22:38', 1, 'Solicitação do Cliente', 2),
(8, '2020-08-04 11:18:53', 1, '2020-08-04 11:18:53', 1, 'Atestado', 1),
(10, '2020-08-11 12:01:41', 1, '2020-08-11 12:01:41', 1, 'Pagamento Extra', 1),
(11, '2020-12-14 09:00:00', 1, '2020-12-14 09:00:00', 1, 'Visita da Supervisão', 1),
(12, '2021-07-14 11:58:24', 11, '2021-07-14 11:58:24', 11, 'Suspensao', 1),
(13, '2021-07-20 09:42:24', 11, '2021-07-20 09:42:24', 11, 'Advertencia', 1),
(14, '2021-07-20 09:42:42', 11, '2021-07-20 09:42:42', 11, 'Cadastro', 1),
(15, '2021-07-20 09:43:05', 11, '2021-07-20 09:43:05', 11, 'Movimentação', 1),
(16, '2021-07-20 09:43:21', 11, '2021-07-20 09:43:21', 11, 'Troca de Posto', 1),
(17, '2021-07-20 10:25:41', 11, '2021-07-20 10:25:41', 11, 'Mal Procedimento/ Relatorio', 1),
(18, '2021-07-20 10:25:58', 11, '2021-07-20 10:25:58', 11, 'Recolhimento', 1),
(19, '2021-07-20 16:52:14', 11, '2021-07-20 16:52:14', 11, 'ASO', 2),
(20, '2021-07-20 16:52:56', 11, '2021-07-20 16:52:56', 11, 'Certificados', 2),
(21, '2021-07-21 13:29:51', 11, '2021-07-21 13:29:51', 11, 'Formulário de Uniforme', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_operacao`
--

CREATE TABLE `tipos_operacao` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_tipo_operacao` varchar(100) NOT NULL,
  `ic_status` int(11) NOT NULL,
  `categorias_financeiras_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_operacao`
--

INSERT INTO `tipos_operacao` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_tipo_operacao`, `ic_status`, `categorias_financeiras_pk`) VALUES
(1020, '2021-09-21 09:37:05', 1, '2021-09-21 09:37:05', 1, 'Compras', 1, 1000),
(1021, '2021-09-21 09:37:46', 1, '2021-09-21 09:37:46', 1, 'Mão de Obra', 1, 1000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_unidades`
--

CREATE TABLE `tipos_unidades` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_unidade` varchar(10) DEFAULT NULL,
  `ic_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turnos`
--

CREATE TABLE `turnos` (
  `pk` int(11) NOT NULL,
  `ds_turno` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turnos`
--

INSERT INTO `turnos` (`pk`, `ds_turno`) VALUES
(1, 'Manhã'),
(2, 'Tarde'),
(3, 'Noite'),
(4, 'Dia Inteiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) NOT NULL,
  `ds_usuario` varchar(60) NOT NULL,
  `ds_login` varchar(45) NOT NULL,
  `ds_senha` varchar(20) NOT NULL,
  `ds_email` varchar(150) DEFAULT NULL,
  `ds_cel` varchar(15) DEFAULT NULL,
  `ic_status` int(11) NOT NULL DEFAULT '2' COMMENT '1 - Ativo; 2 - Inativo',
  `grupos_pk` int(11) NOT NULL,
  `colaboradores_pk` int(11) DEFAULT NULL,
  `leads_pk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`pk`, `dt_cadastro`, `usuario_cadastro_pk`, `dt_ult_atualizacao`, `usuario_ult_atualizacao_pk`, `ds_usuario`, `ds_login`, `ds_senha`, `ds_email`, `ds_cel`, `ic_status`, `grupos_pk`, `colaboradores_pk`, `leads_pk`) VALUES
(1, '2019-06-26 17:54:10', 1, '2019-09-24 14:25:51', 1, 'Adminstrador', 'administrador', '123456', NULL, '11989789188', 1, 1, NULL, NULL),
-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_ponto`
--

CREATE TABLE `usuario_ponto` (
  `pk` int(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `usuario_cadastro_pk` int(11) NOT NULL,
  `dt_ult_atualizacao` datetime NOT NULL,
  `usuario_ult_atualizacao_pk` int(11) DEFAULT NULL,
  `hr_entrada_dom` varchar(8) DEFAULT NULL,
  `hr_saida_dom` varchar(8) DEFAULT NULL,
  `hr_entrada_seg` varchar(8) DEFAULT NULL,
  `hr_saida_seg` varchar(8) DEFAULT NULL,
  `hr_entrada_ter` varchar(8) DEFAULT NULL,
  `hr_saida_ter` varchar(8) DEFAULT NULL,
  `hr_entrada_qua` varchar(8) DEFAULT NULL,
  `hr_saida_qua` varchar(8) DEFAULT NULL,
  `hr_entrada_qui` varchar(8) DEFAULT NULL,
  `hr_saida_qui` varchar(8) DEFAULT NULL,
  `hr_entrada_sex` varchar(8) DEFAULT NULL,
  `hr_saida_sex` varchar(8) DEFAULT NULL,
  `hr_entrada_sab` varchar(8) DEFAULT NULL,
  `hr_saida_sab` varchar(8) DEFAULT NULL,
  `ic_dom` int(11) DEFAULT '2',
  `ic_seg` int(11) DEFAULT '2',
  `ic_ter` int(11) DEFAULT '2',
  `ic_qua` int(11) DEFAULT '2',
  `ic_qui` int(11) DEFAULT '2',
  `ic_sex` int(11) DEFAULT '2',
  `ic_sab` int(11) DEFAULT '2',
  `turnos_pk_dom` int(11) DEFAULT NULL,
  `turnos_pk_seg` int(11) DEFAULT NULL,
  `turnos_pk_ter` int(11) DEFAULT NULL,
  `turnos_pk_qua` int(11) DEFAULT NULL,
  `turnos_pk_qui` int(11) DEFAULT NULL,
  `turnos_pk_sex` int(11) DEFAULT NULL,
  `turnos_pk_sab` int(11) DEFAULT NULL,
  `usuarios_pk` int(11) DEFAULT NULL,
  `colaborador_pk` int(11) DEFAULT NULL,
  `ic_registrar_ponto` int(11) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_ponto`
--


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `afastamento_ferias_colaborador`
--
ALTER TABLE `afastamento_ferias_colaborador`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_agendas_leads1_idx` (`leads_pk`),
  ADD KEY `fk_agendas_processos_etapas1_idx` (`processos_etapas_pk`);

--
-- Índices para tabela `agendas_responsavel`
--
ALTER TABLE `agendas_responsavel`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_agendas_responsavel_agendas1_idx` (`agendas_pk`);

--
-- Índices para tabela `agenda_colaborador_padrao`
--
ALTER TABLE `agenda_colaborador_padrao`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_agenda_colaborador_padrao_coloboradores1_idx` (`colaboradores_pk`),
  ADD KEY `fk_agenda_colaborador_padrao_processos_etapas1_idx` (`processos_etapas_pk`),
  ADD KEY `fk_agenda_colaborador_padrao_contratos_itens1_idx` (`contratos_itens_pk`),
  ADD KEY `idx_colaboradores_pk` (`colaboradores_pk`);

--
-- Índices para tabela `agenda_colaborador_pausa`
--
ALTER TABLE `agenda_colaborador_pausa`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_agenda_colaborador_pausa_motivos_pausas1_idx` (`motivos_pausas_pk`),
  ADD KEY `fk_agenda_colaborador_pausa_coloboradores1_idx` (`colaboradores_pk`),
  ADD KEY `fk_agenda_colaborador_pausa_turnos1_idx` (`turnos_pk`);

--
-- Índices para tabela `agenda_colaborador_tarefa`
--
ALTER TABLE `agenda_colaborador_tarefa`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `apontamentos`
--
ALTER TABLE `apontamentos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `apontamento_servico_extra`
--
ALTER TABLE `apontamento_servico_extra`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `beneficios`
--
ALTER TABLE `beneficios`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `categorias_financeiras`
--
ALTER TABLE `categorias_financeiras`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `categorias_produto`
--
ALTER TABLE `categorias_produto`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_colaboradores_generos1_idx` (`generos_pk`);

--
-- Índices para tabela `colaboradores_beneficios`
--
ALTER TABLE `colaboradores_beneficios`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_colaboradores_beneficios_beneficios_idx` (`beneficios_pk`);

--
-- Índices para tabela `colaboradores_curso`
--
ALTER TABLE `colaboradores_curso`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `colaboradores_exames`
--
ALTER TABLE `colaboradores_exames`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `colaboradores_faltas`
--
ALTER TABLE `colaboradores_faltas`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `colaboradores_hora_extra`
--
ALTER TABLE `colaboradores_hora_extra`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `colaboradores_nome_filho`
--
ALTER TABLE `colaboradores_nome_filho`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `colaboradores_produtos_servicos`
--
ALTER TABLE `colaboradores_produtos_servicos`
  ADD PRIMARY KEY (`colaboradores_pk`,`produtos_servicos_pk`),
  ADD KEY `fk_colaboradores_produtos_servicos_produtos_servicos1_idx` (`produtos_servicos_pk`),
  ADD KEY `fk_colaboradores_produtos_servicos_colaboradores1_idx` (`colaboradores_pk`);

--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `compras_solicitacao`
--
ALTER TABLE `compras_solicitacao`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `compras_solicitacao_orcamentos`
--
ALTER TABLE `compras_solicitacao_orcamentos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `compras_solicitacao_orcamento_itens`
--
ALTER TABLE `compras_solicitacao_orcamento_itens`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `conjunto_material`
--
ALTER TABLE `conjunto_material`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `contas_bancarias`
--
ALTER TABLE `contas_bancarias`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_contas_bancarias_bancos_idx` (`bancos_pk`);

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_contatos_cargos1_idx` (`cargos_pk`),
  ADD KEY `fk_contatos_leads1_idx` (`leads_pk`);

--
-- Índices para tabela `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_contratos_processos_etapas1_idx` (`processos_etapas_pk`),
  ADD KEY `fk_contratos_contratos1_idx` (`contratos_pk`);

--
-- Índices para tabela `contratos_itens`
--
ALTER TABLE `contratos_itens`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_contratos_itens_contratos1_idx` (`contratos_pk`),
  ADD KEY `fk_contratos_itens_produtos_servicos1_idx` (`produtos_servicos_pk`);

--
-- Índices para tabela `contratos_produtos_itens`
--
ALTER TABLE `contratos_produtos_itens`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_contratos_produtos_itens_contratos1_idx` (`contratos_pk`);

--
-- Índices para tabela `contrato_dados_faturamento`
--
ALTER TABLE `contrato_dados_faturamento`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_contrato_dados_faturamento_contratos_idx` (`contratos_pk`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `dias_semana`
--
ALTER TABLE `dias_semana`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_documentos_colaboradores1_idx` (`colaboradores_pk`),
  ADD KEY `fk_documentos_leads1_idx` (`leads_pk`),
  ADD KEY `fk_documentos_contratos1_idx` (`contratos_pk`),
  ADD KEY `fk_documentos_ocorrencias1_idx` (`ocorrencias_pk`);

--
-- Índices para tabela `entrada_estoque`
--
ALTER TABLE `entrada_estoque`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_entrada_estoque_fornecedor1_idx` (`fornecedor_pk`);

--
-- Índices para tabela `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `equipes_usuarios`
--
ALTER TABLE `equipes_usuarios`
  ADD PRIMARY KEY (`equipes_pk`,`usuarios_pk`),
  ADD KEY `fk_equipes_usuarios_usuarios1_idx` (`usuarios_pk`),
  ADD KEY `fk_equipes_usuarios_equipes1_idx` (`equipes_pk`);

--
-- Índices para tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `itens_fatura`
--
ALTER TABLE `itens_fatura`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_itens_fatura_fatura_idx` (`fatura_pk`);

--
-- Índices para tabela `lancamentos`
--
ALTER TABLE `lancamentos`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_lancamentos_tipos_operacao1_idx` (`tipos_operacao_pk`),
  ADD KEY `fk_lancamentos_metodos_pagamento1_idx` (`metodos_pagamento_pk`);

--
-- Índices para tabela `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `leads_desconto`
--
ALTER TABLE `leads_desconto`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `leads_impostos`
--
ALTER TABLE `leads_impostos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `log_exclusao`
--
ALTER TABLE `log_exclusao`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `metodos_pagamento`
--
ALTER TABLE `metodos_pagamento`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `modulos_grupos`
--
ALTER TABLE `modulos_grupos`
  ADD PRIMARY KEY (`modulos_pk`,`grupos_pk`),
  ADD KEY `fk_modulos_grupos_grupos1_idx` (`grupos_pk`),
  ADD KEY `fk_modulos_grupos_modulos1_idx` (`modulos_pk`);

--
-- Índices para tabela `motivos_pausas`
--
ALTER TABLE `motivos_pausas`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `motivo_alteracao_escala`
--
ALTER TABLE `motivo_alteracao_escala`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `movimentacao_estoque`
--
ALTER TABLE `movimentacao_estoque`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `ocorrencias`
--
ALTER TABLE `ocorrencias`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_ocorrencias_tipos_ocorrencias1_idx` (`tipos_ocorrencias_pk`),
  ADD KEY `fk_ocorrencias_processos_etapas1_idx` (`processos_etapas_pk`),
  ADD KEY `fk_ocorrencias_leads1_idx` (`leads_pk`);

--
-- Índices para tabela `ponto`
--
ALTER TABLE `ponto`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `idx_colaborador_pk` (`colaborador_pk`);

--
-- Índices para tabela `ponto_folha`
--
ALTER TABLE `ponto_folha`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `ponto_folha_colaborador`
--
ALTER TABLE `ponto_folha_colaborador`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_ponto_folha_colaborador_ponto_folha_idx` (`ponto_folha_pk`);

--
-- Índices para tabela `ponto_folha_registros`
--
ALTER TABLE `ponto_folha_registros`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_ponto_folha_registros_ponto_folha1_idx` (`ponto_folha_pk`);

--
-- Índices para tabela `ponto_solicitacao_liberacao_app`
--
ALTER TABLE `ponto_solicitacao_liberacao_app`
  ADD PRIMARY KEY (`pk`),
  ADD UNIQUE KEY `ds_pin_UNIQUE` (`ds_pin`),
  ADD KEY `idx_colaborador_pk` (`colaborador_pk`);

--
-- Índices para tabela `processos`
--
ALTER TABLE `processos`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_processos_processos_default1_idx` (`processos_default_pk`),
  ADD KEY `fk_processos_leads1_idx` (`leads_pk`);

--
-- Índices para tabela `processos_default`
--
ALTER TABLE `processos_default`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `processos_default_etapas`
--
ALTER TABLE `processos_default_etapas`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_processos_default_etapas_processos_default1_idx` (`processos_default_pk`),
  ADD KEY `fk_processos_default_etapas_equipes1_idx` (`equipes_pk`);

--
-- Índices para tabela `processos_etapas`
--
ALTER TABLE `processos_etapas`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_processos_etapas_processos1_idx` (`processos_pk`),
  ADD KEY `fk_processos_etapas_equipes1_idx` (`equipes_pk`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_produtos_categorias_produto1_idx` (`categorias_produto_pk`);

--
-- Índices para tabela `produtos_itens`
--
ALTER TABLE `produtos_itens`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_produtos_itens_produtos1_idx` (`produtos_pk`);

--
-- Índices para tabela `produtos_saida`
--
ALTER TABLE `produtos_saida`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_produtos_saida_produtos_itens1_idx` (`produtos_itens_pk`);

--
-- Índices para tabela `produtos_servicos`
--
ALTER TABLE `produtos_servicos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `propostas`
--
ALTER TABLE `propostas`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_propostas_leads1_idx` (`leads_pk`),
  ADD KEY `fk_propostas_processos_etapas1_idx` (`processos_etapas_pk`);

--
-- Índices para tabela `propostas_itens`
--
ALTER TABLE `propostas_itens`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_propostas_itens_propostas1_idx` (`propostas_pk`);

--
-- Índices para tabela `retornos`
--
ALTER TABLE `retornos`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_retornos_ocorrencias1_idx` (`ocorrencias_pk`);

--
-- Índices para tabela `tipos_ocorrencias`
--
ALTER TABLE `tipos_ocorrencias`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `tipos_operacao`
--
ALTER TABLE `tipos_operacao`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_tipos_operacao_categorias_financeiras1_idx` (`categorias_financeiras_pk`);

--
-- Índices para tabela `tipos_unidades`
--
ALTER TABLE `tipos_unidades`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`pk`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fk_usuarios_grupos1_idx` (`grupos_pk`);

--
-- Índices para tabela `usuario_ponto`
--
ALTER TABLE `usuario_ponto`
  ADD PRIMARY KEY (`pk`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `afastamento_ferias_colaborador`
--
ALTER TABLE `afastamento_ferias_colaborador`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `agendas`
--
ALTER TABLE `agendas`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `agendas_responsavel`
--
ALTER TABLE `agendas_responsavel`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `agenda_colaborador_padrao`
--
ALTER TABLE `agenda_colaborador_padrao`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1960;

--
-- AUTO_INCREMENT de tabela `agenda_colaborador_pausa`
--
ALTER TABLE `agenda_colaborador_pausa`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `agenda_colaborador_tarefa`
--
ALTER TABLE `agenda_colaborador_tarefa`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `apontamentos`
--
ALTER TABLE `apontamentos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `apontamento_servico_extra`
--
ALTER TABLE `apontamento_servico_extra`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

--
-- AUTO_INCREMENT de tabela `bancos`
--
ALTER TABLE `bancos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de tabela `beneficios`
--
ALTER TABLE `beneficios`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categorias_financeiras`
--
ALTER TABLE `categorias_financeiras`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT de tabela `categorias_produto`
--
ALTER TABLE `categorias_produto`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1386;

--
-- AUTO_INCREMENT de tabela `colaboradores_beneficios`
--
ALTER TABLE `colaboradores_beneficios`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `colaboradores_curso`
--
ALTER TABLE `colaboradores_curso`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `colaboradores_exames`
--
ALTER TABLE `colaboradores_exames`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `colaboradores_faltas`
--
ALTER TABLE `colaboradores_faltas`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1020;

--
-- AUTO_INCREMENT de tabela `colaboradores_hora_extra`
--
ALTER TABLE `colaboradores_hora_extra`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `colaboradores_nome_filho`
--
ALTER TABLE `colaboradores_nome_filho`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `compras_solicitacao`
--
ALTER TABLE `compras_solicitacao`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `compras_solicitacao_orcamentos`
--
ALTER TABLE `compras_solicitacao_orcamentos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `compras_solicitacao_orcamento_itens`
--
ALTER TABLE `compras_solicitacao_orcamento_itens`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conjunto_material`
--
ALTER TABLE `conjunto_material`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contas_bancarias`
--
ALTER TABLE `contas_bancarias`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contratos`
--
ALTER TABLE `contratos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT de tabela `contratos_itens`
--
ALTER TABLE `contratos_itens`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT de tabela `contratos_produtos_itens`
--
ALTER TABLE `contratos_produtos_itens`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contrato_dados_faturamento`
--
ALTER TABLE `contrato_dados_faturamento`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `dias_semana`
--
ALTER TABLE `dias_semana`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT de tabela `entrada_estoque`
--
ALTER TABLE `entrada_estoque`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `equipes`
--
ALTER TABLE `equipes`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fatura`
--
ALTER TABLE `fatura`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `formulario`
--
ALTER TABLE `formulario`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `itens_fatura`
--
ALTER TABLE `itens_fatura`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lancamentos`
--
ALTER TABLE `lancamentos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `leads`
--
ALTER TABLE `leads`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de tabela `leads_desconto`
--
ALTER TABLE `leads_desconto`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `leads_impostos`
--
ALTER TABLE `leads_impostos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log_exclusao`
--
ALTER TABLE `log_exclusao`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT de tabela `metodos_pagamento`
--
ALTER TABLE `metodos_pagamento`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `modulos`
--
ALTER TABLE `modulos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de tabela `motivos_pausas`
--
ALTER TABLE `motivos_pausas`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `motivo_alteracao_escala`
--
ALTER TABLE `motivo_alteracao_escala`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `movimentacao_estoque`
--
ALTER TABLE `movimentacao_estoque`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ocorrencias`
--
ALTER TABLE `ocorrencias`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=565;

--
-- AUTO_INCREMENT de tabela `ponto`
--
ALTER TABLE `ponto`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `ponto_folha`
--
ALTER TABLE `ponto_folha`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `ponto_folha_colaborador`
--
ALTER TABLE `ponto_folha_colaborador`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `ponto_folha_registros`
--
ALTER TABLE `ponto_folha_registros`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de tabela `ponto_solicitacao_liberacao_app`
--
ALTER TABLE `ponto_solicitacao_liberacao_app`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `processos`
--
ALTER TABLE `processos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de tabela `processos_default`
--
ALTER TABLE `processos_default`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `processos_default_etapas`
--
ALTER TABLE `processos_default_etapas`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `processos_etapas`
--
ALTER TABLE `processos_etapas`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `produtos_itens`
--
ALTER TABLE `produtos_itens`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de tabela `produtos_saida`
--
ALTER TABLE `produtos_saida`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos_servicos`
--
ALTER TABLE `produtos_servicos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `propostas`
--
ALTER TABLE `propostas`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `propostas_itens`
--
ALTER TABLE `propostas_itens`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `retornos`
--
ALTER TABLE `retornos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tipos_ocorrencias`
--
ALTER TABLE `tipos_ocorrencias`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tipos_operacao`
--
ALTER TABLE `tipos_operacao`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT de tabela `tipos_unidades`
--
ALTER TABLE `tipos_unidades`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turnos`
--
ALTER TABLE `turnos`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `usuario_ponto`
--
ALTER TABLE `usuario_ponto`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendas`
--
ALTER TABLE `agendas`
  ADD CONSTRAINT `fk_agendas_leads1` FOREIGN KEY (`leads_pk`) REFERENCES `leads` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agendas_processos_etapas1` FOREIGN KEY (`processos_etapas_pk`) REFERENCES `processos_etapas` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `agendas_responsavel`
--
ALTER TABLE `agendas_responsavel`
  ADD CONSTRAINT `fk_agendas_responsavel_agendas1` FOREIGN KEY (`agendas_pk`) REFERENCES `agendas` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `agenda_colaborador_pausa`
--
ALTER TABLE `agenda_colaborador_pausa`
  ADD CONSTRAINT `fk_agenda_colaborador_pausa_coloboradores1` FOREIGN KEY (`colaboradores_pk`) REFERENCES `colaboradores` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agenda_colaborador_pausa_motivos_pausas1` FOREIGN KEY (`motivos_pausas_pk`) REFERENCES `motivos_pausas` (`pk`),
  ADD CONSTRAINT `fk_agenda_colaborador_pausa_turnos1` FOREIGN KEY (`turnos_pk`) REFERENCES `turnos` (`pk`);

--
-- Limitadores para a tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD CONSTRAINT `fk_colaboradores_generos1` FOREIGN KEY (`generos_pk`) REFERENCES `generos` (`pk`);

--
-- Limitadores para a tabela `colaboradores_beneficios`
--
ALTER TABLE `colaboradores_beneficios`
  ADD CONSTRAINT `fk_colaboradores_beneficios_beneficios` FOREIGN KEY (`beneficios_pk`) REFERENCES `beneficios` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `colaboradores_produtos_servicos`
--
ALTER TABLE `colaboradores_produtos_servicos`
  ADD CONSTRAINT `fk_colaboradores_produtos_servicos_colaboradores1` FOREIGN KEY (`colaboradores_pk`) REFERENCES `colaboradores` (`pk`),
  ADD CONSTRAINT `fk_colaboradores_produtos_servicos_produtos_servicos1` FOREIGN KEY (`produtos_servicos_pk`) REFERENCES `produtos_servicos` (`pk`);

--
-- Limitadores para a tabela `contas_bancarias`
--
ALTER TABLE `contas_bancarias`
  ADD CONSTRAINT `fk_contas_bancarias_bancos` FOREIGN KEY (`bancos_pk`) REFERENCES `bancos` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_contatos_cargos1` FOREIGN KEY (`cargos_pk`) REFERENCES `cargos` (`pk`),
  ADD CONSTRAINT `fk_contatos_leads1` FOREIGN KEY (`leads_pk`) REFERENCES `leads` (`pk`);

--
-- Limitadores para a tabela `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `fk_contratos_contratos1` FOREIGN KEY (`contratos_pk`) REFERENCES `contratos` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contratos_processos_etapas1` FOREIGN KEY (`processos_etapas_pk`) REFERENCES `processos_etapas` (`pk`);

--
-- Limitadores para a tabela `contratos_itens`
--
ALTER TABLE `contratos_itens`
  ADD CONSTRAINT `fk_contratos_itens_contratos1` FOREIGN KEY (`contratos_pk`) REFERENCES `contratos` (`pk`),
  ADD CONSTRAINT `fk_contratos_itens_produtos_servicos1` FOREIGN KEY (`produtos_servicos_pk`) REFERENCES `produtos_servicos` (`pk`);

--
-- Limitadores para a tabela `contrato_dados_faturamento`
--
ALTER TABLE `contrato_dados_faturamento`
  ADD CONSTRAINT `fk_contrato_dados_faturamento_contratos` FOREIGN KEY (`contratos_pk`) REFERENCES `contratos` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `fk_documentos_colaboradores1` FOREIGN KEY (`colaboradores_pk`) REFERENCES `colaboradores` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documentos_contratos1` FOREIGN KEY (`contratos_pk`) REFERENCES `contratos` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documentos_leads1` FOREIGN KEY (`leads_pk`) REFERENCES `leads` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documentos_ocorrencias1` FOREIGN KEY (`ocorrencias_pk`) REFERENCES `ocorrencias` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `entrada_estoque`
--
ALTER TABLE `entrada_estoque`
  ADD CONSTRAINT `fk_entrada_estoque_fornecedor1` FOREIGN KEY (`fornecedor_pk`) REFERENCES `fornecedor` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `equipes_usuarios`
--
ALTER TABLE `equipes_usuarios`
  ADD CONSTRAINT `fk_equipes_usuarios_equipes1` FOREIGN KEY (`equipes_pk`) REFERENCES `equipes` (`pk`),
  ADD CONSTRAINT `fk_equipes_usuarios_usuarios1` FOREIGN KEY (`usuarios_pk`) REFERENCES `usuarios` (`pk`);

--
-- Limitadores para a tabela `itens_fatura`
--
ALTER TABLE `itens_fatura`
  ADD CONSTRAINT `fk_itens_fatura_fatura` FOREIGN KEY (`fatura_pk`) REFERENCES `fatura` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `modulos_grupos`
--
ALTER TABLE `modulos_grupos`
  ADD CONSTRAINT `fk_modulos_grupos_grupos1` FOREIGN KEY (`grupos_pk`) REFERENCES `grupos` (`pk`),
  ADD CONSTRAINT `fk_modulos_grupos_modulos1` FOREIGN KEY (`modulos_pk`) REFERENCES `modulos` (`pk`);

--
-- Limitadores para a tabela `ocorrencias`
--
ALTER TABLE `ocorrencias`
  ADD CONSTRAINT `fk_ocorrencias_leads1` FOREIGN KEY (`leads_pk`) REFERENCES `leads` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ocorrencias_processos_etapas1` FOREIGN KEY (`processos_etapas_pk`) REFERENCES `processos_etapas` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ocorrencias_tipos_ocorrencias1` FOREIGN KEY (`tipos_ocorrencias_pk`) REFERENCES `tipos_ocorrencias` (`pk`);

--
-- Limitadores para a tabela `ponto_folha_colaborador`
--
ALTER TABLE `ponto_folha_colaborador`
  ADD CONSTRAINT `fk_ponto_folha_colaborador_ponto_folha` FOREIGN KEY (`ponto_folha_pk`) REFERENCES `ponto_folha` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ponto_folha_registros`
--
ALTER TABLE `ponto_folha_registros`
  ADD CONSTRAINT `fk_ponto_folha_registros_ponto_folha1` FOREIGN KEY (`ponto_folha_pk`) REFERENCES `ponto_folha` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `processos`
--
ALTER TABLE `processos`
  ADD CONSTRAINT `fk_processos_leads1` FOREIGN KEY (`leads_pk`) REFERENCES `leads` (`pk`),
  ADD CONSTRAINT `fk_processos_processos_default1` FOREIGN KEY (`processos_default_pk`) REFERENCES `processos_default` (`pk`);

--
-- Limitadores para a tabela `processos_default_etapas`
--
ALTER TABLE `processos_default_etapas`
  ADD CONSTRAINT `fk_processos_default_etapas_equipes1` FOREIGN KEY (`equipes_pk`) REFERENCES `equipes` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_processos_default_etapas_processos_default1` FOREIGN KEY (`processos_default_pk`) REFERENCES `processos_default` (`pk`);

--
-- Limitadores para a tabela `processos_etapas`
--
ALTER TABLE `processos_etapas`
  ADD CONSTRAINT `fk_processos_etapas_equipes1` FOREIGN KEY (`equipes_pk`) REFERENCES `equipes` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_processos_etapas_processos1` FOREIGN KEY (`processos_pk`) REFERENCES `processos` (`pk`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_categorias_produto1` FOREIGN KEY (`categorias_produto_pk`) REFERENCES `categorias_produto` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos_itens`
--
ALTER TABLE `produtos_itens`
  ADD CONSTRAINT `fk_produtos_itens_produtos1` FOREIGN KEY (`produtos_pk`) REFERENCES `produtos` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos_saida`
--
ALTER TABLE `produtos_saida`
  ADD CONSTRAINT `fk_produtos_saida_produtos_itens1` FOREIGN KEY (`produtos_itens_pk`) REFERENCES `produtos_itens` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `propostas`
--
ALTER TABLE `propostas`
  ADD CONSTRAINT `fk_propostas_leads1` FOREIGN KEY (`leads_pk`) REFERENCES `leads` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_propostas_processos_etapas1` FOREIGN KEY (`processos_etapas_pk`) REFERENCES `processos_etapas` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `propostas_itens`
--
ALTER TABLE `propostas_itens`
  ADD CONSTRAINT `fk_propostas_itens_propostas1` FOREIGN KEY (`propostas_pk`) REFERENCES `propostas` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `retornos`
--
ALTER TABLE `retornos`
  ADD CONSTRAINT `fk_retornos_ocorrencias1` FOREIGN KEY (`ocorrencias_pk`) REFERENCES `ocorrencias` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tipos_operacao`
--
ALTER TABLE `tipos_operacao`
  ADD CONSTRAINT `fk_tipos_operacao_categorias_financeiras1` FOREIGN KEY (`categorias_financeiras_pk`) REFERENCES `categorias_financeiras` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_grupos1` FOREIGN KEY (`grupos_pk`) REFERENCES `grupos` (`pk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
