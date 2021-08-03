-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Ago-2021 às 00:42
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sice`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(2) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `numero` varchar(6) DEFAULT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nome`, `numero`, `rua`, `cidade`, `bairro`, `cep`, `complemento`) VALUES
(1, 'ExtinVale', '100', 'Avenida Brasil', 'Rio de Janeiro', 'Copacabana', '12059928', NULL),
(2, 'Bombeiro S.A.', '42', 'Rua Epitácio Figueredo', 'Diamantina', 'Vila Velha', '19204838', NULL),
(3, 'ProFax', '96', 'Rua Coronel Afonso', 'Sao Jose do Rio Preto', 'Santa Adalia', '38191892', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `extintor`
--

CREATE TABLE `extintor` (
  `idExtintor` int(2) NOT NULL,
  `idUsuario` int(2) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `tipo_extintor` varchar(10) NOT NULL,
  `selo_inmetro` varchar(8) NOT NULL,
  `ult_recarga` date NOT NULL,
  `vencimento` date NOT NULL,
  `localizacao` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha`
--

CREATE TABLE `ficha` (
  `idFicha` int(2) NOT NULL,
  `idUsuario` int(2) NOT NULL,
  `selo_inmetro` varchar(8) NOT NULL,
  `data_criacao` date NOT NULL,
  `limpeza` varchar(3) NOT NULL,
  `sinal_piso` varchar(3) NOT NULL,
  `venc_carga` varchar(3) NOT NULL,
  `teste_hidro` varchar(3) NOT NULL,
  `lacre` varchar(3) NOT NULL,
  `mangueira` varchar(3) NOT NULL,
  `suporte` varchar(3) NOT NULL,
  `sinal_parede` varchar(3) NOT NULL,
  `manometro` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(2) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `idEmpresa` int(2) NOT NULL,
  `imagem` longblob DEFAULT NULL,
  `telefone` varchar(11) NOT NULL,
  `sobrenome` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `data_nasc`, `cpf`, `senha`, `email`, `idEmpresa`, `imagem`, `telefone`, `sobrenome`) VALUES
(1, 'admin', '2000-01-01', '0000000000', 'admin', 'admin@admin.com', 1, NULL, '00000000000', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices para tabela `extintor`
--
ALTER TABLE `extintor`
  ADD PRIMARY KEY (`idExtintor`),
  ADD KEY `indice1` (`selo_inmetro`),
  ADD KEY `indice2` (`idExtintor`,`selo_inmetro`,`tipo_extintor`,`ult_recarga`,`vencimento`);

--
-- Índices para tabela `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`idFicha`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `extintor`
--
ALTER TABLE `extintor`
  MODIFY `idExtintor` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `ficha`
--
ALTER TABLE `ficha`
  MODIFY `idFicha` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
