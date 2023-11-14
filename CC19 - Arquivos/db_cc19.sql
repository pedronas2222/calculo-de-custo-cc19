-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/11/2023 às 16:07
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_cc19`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_end_fornecedor`
--

CREATE TABLE `tab_end_fornecedor` (
  `ID` int(11) NOT NULL,
  `LOGRADOURO` varchar(255) DEFAULT NULL,
  `NUMERO` varchar(10) DEFAULT NULL,
  `BAIRRO` varchar(255) DEFAULT NULL,
  `COD_MUNICIPIO` int(11) DEFAULT NULL,
  `NOME_MUNICIPIO` varchar(255) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `CEP` varchar(10) DEFAULT NULL,
  `COD_PAIS` int(11) DEFAULT NULL,
  `NOME_PAIS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_fornecedores`
--

CREATE TABLE `tab_fornecedores` (
  `CNPJ` varchar(18) NOT NULL,
  `NOM_RAZAO` varchar(255) DEFAULT NULL,
  `NOM_FANTASIA` varchar(255) DEFAULT NULL,
  `INSC_ESTADUAL` varchar(20) DEFAULT NULL,
  `INSC_MUNICIPAL` varchar(20) DEFAULT NULL,
  `RESPONSAVEL` varchar(255) DEFAULT NULL,
  `FONE` varchar(30) NOT NULL,
  `CRT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_produtos`
--

CREATE TABLE `tab_produtos` (
  `COD` int(11) NOT NULL,
  `NUM_NOTA_FISCAL_ORIGEM` varchar(255) DEFAULT NULL,
  `DATA_COMPRA` date DEFAULT NULL,
  `FORNECEDOR` varchar(255) DEFAULT NULL,
  `ITEM_PRODUTO` varchar(255) DEFAULT NULL,
  `COD_PRODUTO` varchar(255) DEFAULT NULL,
  `DESC_PRODUTO` varchar(255) DEFAULT NULL,
  `UN_PRODUTO` varchar(255) DEFAULT NULL,
  `VAL_UNI_PRODUTO` decimal(10,2) DEFAULT NULL,
  `QUANT_PRODUTO` decimal(10,2) DEFAULT NULL,
  `ALIQ_NF_ORIGEM_PRODUTO` decimal(5,2) DEFAULT NULL,
  `VALOR_ICMS_ORIGEM` decimal(10,2) DEFAULT NULL,
  `VALOR_ICMS_PARA` decimal(10,2) DEFAULT 19.00,
  `VALOR_A_PAGAR_DIF_ICMS` decimal(10,2) DEFAULT NULL,
  `CUSTO_TRANSPORTE` decimal(10,2) DEFAULT NULL,
  `CUSTO_TOTAL_PRODUTO` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tab_end_fornecedor`
--
ALTER TABLE `tab_end_fornecedor`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `tab_fornecedores`
--
ALTER TABLE `tab_fornecedores`
  ADD PRIMARY KEY (`CNPJ`);

--
-- Índices de tabela `tab_produtos`
--
ALTER TABLE `tab_produtos`
  ADD PRIMARY KEY (`COD`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_end_fornecedor`
--
ALTER TABLE `tab_end_fornecedor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
