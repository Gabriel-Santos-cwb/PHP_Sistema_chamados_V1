-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/01/2024 às 02:01
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
-- Banco de dados: `intranet`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avisos`
--

CREATE TABLE `avisos` (
  `ID_avisos` int(11) NOT NULL,
  `id_form` char(20) DEFAULT NULL,
  `ativo` char(20) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `importancia` char(20) DEFAULT NULL,
  `class` char(100) DEFAULT NULL,
  `coluna3` text DEFAULT NULL,
  `titulo` char(200) DEFAULT NULL,
  `nome` char(100) DEFAULT NULL,
  `anexo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Estrutura para tabela `historico_user`
--

CREATE TABLE `historico_user` (
  `historico_user` int(11) NOT NULL,
  `id_user` char(20) DEFAULT NULL,
  `ID_aten` char(20) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `acao` char(100) DEFAULT NULL,
  `nome_aten` char(100) DEFAULT NULL,
  `data1` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `Login_user` char(255) NOT NULL,
  `nomeCompleto` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `senha` char(255) NOT NULL,
  `arquivo` blob DEFAULT NULL,
  `genero` char(50) DEFAULT NULL,
  `nivel` char(10) DEFAULT NULL,
  `ativo` char(10) DEFAULT NULL,
  `acessos` char(100) DEFAULT NULL,
  `desativado_ti` char(10) DEFAULT NULL,
  `desativado_RH` char(10) DEFAULT NULL,
  `desativado_Intranet` char(10) DEFAULT NULL,
  `desativado_Financeiro` char(10) DEFAULT NULL,
  `Setor_user` char(100) DEFAULT NULL,
  `adm_gerencial` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login Admin - Admin@23`
--

INSERT INTO `login` (`id_login`, `Login_user`, `nomeCompleto`, `email`, `senha`, `arquivo`, `genero`, `nivel`, `ativo`, `acessos`, `desativado_ti`, `desativado_RH`, `desativado_Intranet`, `desativado_Financeiro`, `Setor_user`, `adm_gerencial`) VALUES
(1, 'Sem atendente', 'Sem atendente', 'Sem atendente', '$2ysdIHBtlaSeb6jOK3x/PhzFHLp5hh4KqKlo3V/SvsTRg9q', NULL, '4', '0', '1', '1', '', NULL, NULL, NULL, '1', 'ranhenhe'),
(2, 'Admin', 'Admin Sistema', 'admin@admin.com.br', '$2y$10$TLYIQJiY5cIHBtlaSeb6jOK3x/PhzFHLp5hh4KqKlo3V/SvsTRg9q', 0x65633531356539303739383263323562376137626163346564363435663631372e6a7067, '4', '0', '1', '1', '', NULL, NULL, NULL, '1', '0800'),
(3, 'resolvedor', 'Hebert o Imortal da Silva', 'hebertimortal@gmail.com', '$2y$10$CNwa/lkPuhtPexRhsxjlHej.00v8quKz9vyZwYvHN14AGveY03Wma', NULL, '2', '8', '1', '3', '', NULL, NULL, NULL, '3', '8'),
(4, 'comum', 'Andre ferreira Monteiro', 'andreferreiraas@hotmail.com.br', '$2y$10$C6PESBybPdUx/tjxyLWezOWu4OCexXsZyOJS7DAkwO8JEveOXdDkW', 0x65313834656631643930653665623466303662346238656562386637333338622e6a7067, '4', '0', '1', '3', '', NULL, NULL, NULL, '4', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`ID_avisos`);

--
-- Índices de tabela `historico_user`
--
ALTER TABLE `historico_user`
  ADD PRIMARY KEY (`historico_user`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avisos`
--
ALTER TABLE `avisos`
  MODIFY `ID_avisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `historico_user`
--
ALTER TABLE `historico_user`
  MODIFY `historico_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
