-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/02/2024 às 16:21
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `chamados-intranet`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acao_subcategoria`
--

CREATE TABLE `acao_subcategoria` (
  `id_acao` int(11) NOT NULL,
  `id_form` char(20) DEFAULT NULL,
  `id_subcategoria` char(20) DEFAULT NULL,
  `id_setor` char(10) DEFAULT NULL,
  `ativo` char(10) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `nome_acao` char(200) DEFAULT NULL,
  `id_sla` char(10) DEFAULT NULL,
  `IDprioridade` char(10) DEFAULT NULL,
  `Setor_id` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `acao_subcategoria`
--

INSERT INTO `acao_subcategoria` (`id_acao`, `id_form`, `id_subcategoria`, `id_setor`, `ativo`, `descricao`, `nome_acao`, `id_sla`, `IDprioridade`, `Setor_id`) VALUES
(1, NULL, '1', NULL, '1', NULL, 'Troca de tooner', '1', '1', '1'),
(2, NULL, '3', NULL, '1', NULL, 'Configurar e-mail', '1', '1', '1'),
(3, NULL, '4', NULL, '0', NULL, 'Solicitar ferias', '2', '1', '2'),
(4, NULL, '9', NULL, '1', NULL, 'Trocra tinta', '1', '2', '3'),
(5, NULL, '10', NULL, '1', NULL, 'Trocar Tonner', '1', '1', '3'),
(6, NULL, '10', NULL, '1', NULL, 'Configurar Impressora', '1', '1', '3'),
(7, NULL, '11', NULL, '1', NULL, 'Configurar Wifi', '1', '1', '3'),
(8, NULL, '11', NULL, '1', NULL, 'Adicionar novo ponto', '1', '1', '3'),
(9, NULL, '20', NULL, '1', NULL, 'Solicitar Ferias', '1', '1', '4'),
(10, NULL, '20', NULL, '1', NULL, 'Cancelar Ferias', '1', '1', '4'),
(11, NULL, '21', NULL, '1', NULL, 'Realizar correção de marcação', '2', '2', '4'),
(12, NULL, '21', NULL, '1', NULL, 'Contestar marcação incorreta', '1', '3', '4'),
(13, NULL, '16', NULL, '1', NULL, 'novo acerto', '2', '2', '2'),
(14, NULL, '17', NULL, '1', NULL, 'Adicionar', '2', '1', '2'),
(15, NULL, '17', NULL, '1', NULL, 'Cancelar', '2', '1', '2'),
(16, NULL, '18', NULL, '1', NULL, 'Adicionar', '2', '1', '2'),
(17, NULL, '18', NULL, '1', NULL, 'Cancelar', '2', '1', '2'),
(18, NULL, '19', NULL, '1', NULL, 'Adicionar dependente', '1', '3', '2'),
(19, NULL, '19', NULL, '1', NULL, 'Cancelar plano dependente', '1', '1', '2'),
(20, NULL, '19', NULL, '1', NULL, 'Cancelar meu plano', '1', '1', '2'),
(26, NULL, '28', NULL, '1', NULL, 'Denúncia de mal Uso', '1', '1', '11'),
(27, NULL, '29', NULL, '1', NULL, 'Informar Erro', '1', '1', '12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `calendarios`
--

CREATE TABLE `calendarios` (
  `id_calendario` int(11) NOT NULL,
  `diasTrabalho` char(200) DEFAULT NULL,
  `horarioInicio` char(100) DEFAULT NULL,
  `horarioFim` char(100) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `feriado` tinyint(1) DEFAULT NULL,
  `nome_calendario` char(150) DEFAULT NULL,
  `ativo` char(10) DEFAULT NULL,
  `setor_id` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `calendarios`
--

INSERT INTO `calendarios` (`id_calendario`, `diasTrabalho`, `horarioInicio`, `horarioFim`, `ano`, `feriado`, `nome_calendario`, `ativo`, `setor_id`) VALUES
(1, 'segunda,terca,quarta,quinta,sexta', '08:00', '18:00', NULL, NULL, 'Padrão', '1', '1'),
(2, 'segunda,terca,quarta,quinta,sexta,sabado,domingo', '00:00', '23:59', NULL, NULL, '24x7', '1', '2'),
(3, 'sabado,domingo', '10:00', '13:00', NULL, NULL, 'Finais de Semana', '1', '2'),
(4, 'segunda,terca,quarta,quinta,sexta,sabado', '10:00', '16:00', NULL, NULL, 'Financeiro', '1', '2'),
(5, 'segunda', '01:00', '02:12', NULL, NULL, 'ghghgh', '0', '1'),
(6, 'quarta,quinta', '04:54', '05:45', NULL, NULL, 'sasas', '1', '1'),
(7, 'quarta,quinta', '04:54', '05:45', NULL, NULL, 'sasas', '0', '1'),
(8, 'quarta,quinta', '04:54', '05:45', NULL, NULL, 'sasas', '0', '1'),
(9, 'segunda,terca,quarta,quinta,sexta', '08:00', '18:00', NULL, NULL, 'Segunda a Sexta TI', '1', '3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_incidente`
--

CREATE TABLE `categoria_incidente` (
  `id_categoria` int(11) NOT NULL,
  `nome_cat` char(100) DEFAULT NULL,
  `obs` char(200) DEFAULT NULL,
  `ativo` char(20) DEFAULT NULL,
  `id_setor` char(20) DEFAULT NULL,
  `vinculo_setor` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria_incidente`
--

INSERT INTO `categoria_incidente` (`id_categoria`, `nome_cat`, `obs`, `ativo`, `id_setor`, `vinculo_setor`) VALUES
(1, 'SEM CAT', NULL, '1', '1', '1'),
(2, 'Erro/Falha', NULL, '1', '3', '3'),
(3, 'E-mail', NULL, '1', '3', '3'),
(4, 'Perifericos', NULL, '1', '3', '3'),
(5, 'Acerto de Despesas', NULL, '1', '2', '2'),
(6, 'Beneficios', NULL, '1', '2', '4'),
(7, 'Ferias', NULL, '1', '4', '4'),
(8, 'Folha ponto', NULL, '1', '4', '4'),
(16, 'Intranet', NULL, '1', '12', '12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `IDchamados` int(11) NOT NULL,
  `IDlogin_user` char(100) NOT NULL,
  `nome_user` char(100) NOT NULL,
  `email_user` char(100) NOT NULL,
  `tel_user` char(100) NOT NULL,
  `IDatendente` char(100) DEFAULT '0',
  `IDstatus` char(100) DEFAULT '1',
  `IDprioridade` char(100) NOT NULL,
  `IDcidade` char(100) NOT NULL,
  `IDsetor` char(50) NOT NULL,
  `incidente` text DEFAULT NULL,
  `resposta_aten` text DEFAULT NULL,
  `resposta_aten_anexo` blob DEFAULT NULL,
  `resposta_clie` text DEFAULT NULL,
  `resposta_clie_anexo` blob DEFAULT NULL,
  `data_abertura` datetime DEFAULT NULL,
  `data_abertura_att` date DEFAULT NULL,
  `data_abertura_fechamento` datetime DEFAULT NULL,
  `tempo_final` char(100) DEFAULT NULL,
  `tipo_incidente` char(200) DEFAULT NULL,
  `hora` char(100) DEFAULT NULL,
  `hist_nome` char(100) DEFAULT NULL,
  `IDcategoria` char(50) DEFAULT NULL,
  `IDSubCategoria` char(50) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `nome_completo` char(200) DEFAULT NULL,
  `IDacao` char(10) DEFAULT NULL,
  `nome_atendente` char(150) DEFAULT NULL,
  `Loginate` char(140) DEFAULT NULL,
  `resolv` char(10) DEFAULT '0',
  `cancel_user` char(10) DEFAULT '0',
  `reaberto` char(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `id_cidade` int(11) NOT NULL,
  `nome_cidade` char(200) DEFAULT NULL,
  `UF` char(20) DEFAULT NULL,
  `ativo` char(10) DEFAULT NULL,
  `IDsetor` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidades`
--

INSERT INTO `cidades` (`id_cidade`, `nome_cidade`, `UF`, `ativo`, `IDsetor`) VALUES
(1, 'Curitiba', 'PR', '1', NULL),
(2, 'São Paulo', 'SP', '1', NULL),
(3, 'Bahia', 'BA', '1', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `incidente`
--

CREATE TABLE `incidente` (
  `IDincidente` int(11) NOT NULL,
  `nome_incidente` char(100) NOT NULL,
  `id_setor_respo` char(100) NOT NULL,
  `ativo` varchar(10) DEFAULT NULL,
  `nome_set` varchar(100) DEFAULT NULL,
  `nome_cidade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prioridade`
--

CREATE TABLE `prioridade` (
  `IDprioridade` int(11) NOT NULL,
  `nome_prioridade` char(100) NOT NULL,
  `numero_prioridade` char(10) DEFAULT NULL,
  `ativo` char(10) DEFAULT NULL,
  `vinculo_setor` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `prioridade`
--

INSERT INTO `prioridade` (`IDprioridade`, `nome_prioridade`, `numero_prioridade`, `ativo`, `vinculo_setor`) VALUES
(1, 'Baixa', NULL, '1', '1'),
(2, 'Media', NULL, '1', '1'),
(3, 'Alta', NULL, '1', '2'),
(5, 'Media', NULL, '1', '3'),
(6, 'Baixa', NULL, '1', '3'),
(7, 'Alta', NULL, '1', '3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas`
--

CREATE TABLE `respostas` (
  `IDresposta` int(11) NOT NULL,
  `res_ate` text DEFAULT NULL,
  `res_soli` text DEFAULT NULL,
  `IDchamado` char(50) DEFAULT NULL,
  `IDsolicitante` char(50) DEFAULT NULL,
  `IDatendente` char(50) DEFAULT NULL,
  `anexo` blob DEFAULT NULL,
  `nome_ate` char(100) DEFAULT NULL,
  `nome_soli` char(100) DEFAULT NULL,
  `controle` char(50) DEFAULT NULL,
  `data1` char(70) DEFAULT NULL,
  `hist_chamado` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Estrutura para tabela `setor`
--

CREATE TABLE `setor` (
  `IDsetor` int(11) NOT NULL,
  `nome_setor` char(100) NOT NULL,
  `cidade_setor` char(100) NOT NULL,
  `ativo` varchar(10) DEFAULT NULL,
  `vinculo_setor` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `setor`
--

INSERT INTO `setor` (`IDsetor`, `nome_setor`, `cidade_setor`, `ativo`, `vinculo_setor`) VALUES
(1, 'Sistema', '1', '0', '1'),
(2, 'Finaceiro', '2', '1', '2'),
(3, 'Tecnologia da Informação', '1', '1', ''),
(4, 'RH Gestores', '1', '1', NULL),
(12, 'RH Colaboradores', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sla_chamados`
--

CREATE TABLE `sla_chamados` (
  `id_sla` int(11) NOT NULL,
  `nome_sla` char(150) DEFAULT NULL,
  `id_calendario` char(20) DEFAULT NULL,
  `id_prioridade` char(20) DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  `ativo` char(10) DEFAULT NULL,
  `id_setor` char(20) DEFAULT NULL,
  `vinculo_setor` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sla_chamados`
--

INSERT INTO `sla_chamados` (`id_sla`, `nome_sla`, `id_calendario`, `id_prioridade`, `tempo`, `ativo`, `id_setor`, `vinculo_setor`) VALUES
(1, '2 Horas', '1', '3', '02:00:00', '1', NULL, NULL),
(2, '10 horas', '1', '1', '10:00:00', '1', NULL, NULL),
(3, 'Teste', '6', '2', '05:54:00', '0', NULL, '1'),
(4, 'Media - TI', '9', '5', '06:00:00', '1', NULL, '3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `ID_status` int(11) NOT NULL,
  `id_setor` char(20) DEFAULT NULL,
  `ativo` char(20) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `importancia` char(20) DEFAULT NULL,
  `class` char(100) DEFAULT NULL,
  `titulo` char(200) DEFAULT NULL,
  `coluna3` text DEFAULT NULL,
  `visao` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `status`
--

INSERT INTO `status` (`ID_status`, `id_setor`, `ativo`, `descricao`, `importancia`, `class`, `titulo`, `coluna3`, `visao`) VALUES
(1, '1', '1', '1', '1', NULL, 'NOVO', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"30\" fill=\"currentColor\" class=\"bi bi-check-all\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z\"/>\r\n</svg>', '0'),
(2, '1as', '1', NULL, '2', NULL, 'Designado', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"50\" height=\"50\" fill=\"currentColor\" class=\"bi bi-android\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M2.76 3.061a.5.5 0 0 1 .679.2l1.283 2.352A8.94 8.94 0 0 1 8 5a8.94 8.94 0 0 1 3.278.613l1.283-2.352a.5.5 0 1 1 .878.478l-1.252 2.295C14.475 7.266 16 9.477 16 12H0c0-2.523 1.525-4.734 3.813-5.966L2.56 3.74a.5.5 0 0 1 .2-.678ZM5 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm6 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z\"/>\r\n</svg>', '0'),
(3, '1', '1', '1', '1', NULL, 'Reaberto', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"30\" fill=\"currentColor\" class=\"bi bi-headset\" viewBox=\"0 0 16 16\">\r\n                <path d=\"M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z\"/>\r\n                </svg>', '1'),
(4, '1', '1', NULL, '6', NULL, 'Cancelados', '   <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"30\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">\n                <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z\"/>\n                <path d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z\"/>\n                </svg>', '1'),
(5, '1', '1', NULL, '5', NULL, 'Pendentes', '   <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"25\" height=\"25\" fill=\"currentColor\" class=\"bi bi-pause-circle\" viewBox=\"0 0 16 16\">\r\n                <path d=\"M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z\"/>\r\n                <path d=\"M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5z\"/>\r\n                </svg>', '1'),
(6, '1', '1', NULL, '5', NULL, 'Fechados/Resolvidos', ' <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"30\" fill=\"currentColor\" class=\"bi bi-check2-all\" viewBox=\"0 0 16 16\">\r\n                    <path d=\"M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z\"/>\r\n                    <path d=\"m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z\"/>\r\n                    </svg>', '1'),
(7, '3', '1', NULL, '5', NULL, 'Em andamento', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"30\" fill=\"currentColor\" class=\"bi bi-skip-start-circle\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z\"/>\r\n  <path d=\"M10.229 5.055a.5.5 0 0 0-.52.038L7 7.028V5.5a.5.5 0 0 0-1 0v5a.5.5 0 0 0 1 0V8.972l2.71 1.935a.5.5 0 0 0 .79-.407v-5a.5.5 0 0 0-.271-.445z\"/>\r\n</svg>', '0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sub_categoria`
--

CREATE TABLE `sub_categoria` (
  `id_subcategoria` int(11) NOT NULL,
  `id_categoria` char(20) DEFAULT NULL,
  `ativo` char(20) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `nome_sub` char(200) DEFAULT NULL,
  `vinculo_setor` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sub_categoria`
--

INSERT INTO `sub_categoria` (`id_subcategoria`, `id_categoria`, `ativo`, `descricao`, `nome_sub`, `vinculo_setor`) VALUES
(10, '2', '1', NULL, 'Impressora', '3'),
(11, '2', '1', NULL, 'Wifi', '3'),
(12, '3', '1', NULL, 'Configurar', '3'),
(13, '3', '1', NULL, 'Alterar', '3'),
(14, '4', '1', NULL, 'Solicitar novo', '3'),
(15, '4', '1', NULL, 'Substituir', '3'),
(16, '5', '1', NULL, 'Solicitar novo', '2'),
(17, '6', '1', NULL, 'VT', '2'),
(18, '6', '1', NULL, 'VR', '2'),
(19, '6', '1', NULL, 'Plano de saude', '2'),
(20, '7', '1', NULL, 'Minhas Ferias', '4'),
(21, '8', '1', NULL, 'Marcações', '4'),
(29, '16', '1', NULL, 'Solicitação', '12');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acao_subcategoria`
--
ALTER TABLE `acao_subcategoria`
  ADD PRIMARY KEY (`id_acao`);

--
-- Índices de tabela `calendarios`
--
ALTER TABLE `calendarios`
  ADD PRIMARY KEY (`id_calendario`);

--
-- Índices de tabela `categoria_incidente`
--
ALTER TABLE `categoria_incidente`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`IDchamados`);

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Índices de tabela `incidente`
--
ALTER TABLE `incidente`
  ADD PRIMARY KEY (`IDincidente`);

--
-- Índices de tabela `prioridade`
--
ALTER TABLE `prioridade`
  ADD PRIMARY KEY (`IDprioridade`);

--
-- Índices de tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`IDresposta`);

--
-- Índices de tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`IDsetor`);

--
-- Índices de tabela `sla_chamados`
--
ALTER TABLE `sla_chamados`
  ADD PRIMARY KEY (`id_sla`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_status`);

--
-- Índices de tabela `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD PRIMARY KEY (`id_subcategoria`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acao_subcategoria`
--
ALTER TABLE `acao_subcategoria`
  MODIFY `id_acao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `calendarios`
--
ALTER TABLE `calendarios`
  MODIFY `id_calendario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `categoria_incidente`
--
ALTER TABLE `categoria_incidente`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `IDchamados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `incidente`
--
ALTER TABLE `incidente`
  MODIFY `IDincidente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prioridade`
--
ALTER TABLE `prioridade`
  MODIFY `IDprioridade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `IDresposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `IDsetor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `sla_chamados`
--
ALTER TABLE `sla_chamados`
  MODIFY `id_sla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `ID_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `sub_categoria`
--
ALTER TABLE `sub_categoria`
  MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
