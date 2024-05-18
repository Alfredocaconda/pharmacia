-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/03/2024 às 21:41
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
-- Banco de dados: `farmacia_lobito`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `entrada`
--

CREATE TABLE `entrada` (
  `ide` bigint(20) NOT NULL,
  `preco` varchar(100) NOT NULL,
  `qtd` int(11) DEFAULT NULL,
  `dataentrada` datetime DEFAULT NULL,
  `caducidade` date DEFAULT NULL,
  `idp` bigint(20) DEFAULT NULL,
  `idf` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `entrada`
--

INSERT INTO `entrada` (`ide`, `preco`, `qtd`, `dataentrada`, `caducidade`, `idp`, `idf`) VALUES
(1, '150', 94, '2024-02-21 00:00:00', '2024-02-28', 1, 1),
(2, '150', 0, '2024-02-21 00:00:00', '2024-02-29', 4, 6),
(3, '10', 0, '2024-02-20 11:56:39', '2024-02-21', 3, 1),
(4, '150', 50, '2024-02-22 00:00:00', '2024-02-24', 7, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idf` bigint(20) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `genero` enum('MASCULINO','FEMENINO') DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `cargo` enum('gerente','farmaceutico') DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`idf`, `nome`, `genero`, `telefone`, `cargo`, `data_nascimento`, `senha`, `endereco`, `foto`) VALUES
(1, 'ALFREDO CACONDA', 'MASCULINO', 'programador', 'gerente', '1997-04-21', 'programador', 'BENGUELA', ''),
(6, 'Carolina Ngeve', 'FEMENINO', 'carolina@gmail.com', 'gerente', '2024-02-21', 'carolina', 'Bocoio', '20240225030204.jpeg'),
(8, 'ELSA MARTINHO', 'FEMENINO', 'martinhoelsa95@gmail.com', 'farmaceutico', '2024-02-21', '00000', 'LOBITO/BELA VISTA', ''),
(9, 'Amelia Da Costa', 'FEMENINO', '0954324589', 'farmaceutico', '2024-03-04', '123456789', 'Lobito', ''),
(10, 'PEDRO NASSOMA', 'MASCULINO', '0000', 'farmaceutico', '2024-03-28', '0000', 'LOBITO', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `idp` bigint(20) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `categoria` varchar(60) DEFAULT NULL,
  `idf` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`idp`, `nome`, `descricao`, `categoria`, `idf`) VALUES
(1, 'PARACETAMOL', '150MG', 'AMPOLA', 1),
(3, 'AMOXACICLINA', '500MG', 'CHAROPE', 1),
(4, 'dolarem', '100mg', 'comprimido', 1),
(7, 'COARTEM', '500MG', 'AMPOLA', 6),
(8, 'DICLOFENAQUE', '12121', 'comprimido', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `rastreioe`
--

CREATE TABLE `rastreioe` (
  `idR` bigint(20) NOT NULL,
  `qtdencontrada` int(11) DEFAULT NULL,
  `qtdadicionada` int(11) DEFAULT NULL,
  `qtdtotal` int(11) DEFAULT NULL,
  `dataactualizacao` datetime DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `idp` bigint(20) DEFAULT NULL,
  `idf` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `idv` bigint(20) NOT NULL,
  `qtdrequerida` int(11) DEFAULT NULL,
  `totalCompra` int(11) DEFAULT NULL,
  `datavenda` varchar(255) DEFAULT NULL,
  `fatura` varchar(22) DEFAULT NULL,
  `idp` bigint(20) DEFAULT NULL,
  `idf` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `venda`
--

INSERT INTO `venda` (`idv`, `qtdrequerida`, `totalCompra`, `datavenda`, `fatura`, `idp`, `idf`) VALUES
(1, 50, 7500, NULL, NULL, 4, 1),
(4, 5, 50, NULL, NULL, 3, 1),
(12, 4, 600, '2024/03/04/11:28:20', '20240304112820', 4, 1),
(13, 4, 600, '2024/03/04/11:32:05', '20240304113205', 4, 1),
(14, 50, 7500, '2024/03/04/11:32:15', '20240304113215', 1, 1),
(15, 100, 15000, '2024/03/04/11:37:40', '20240304113740', 1, 1),
(16, 25, 3750, '2024/03/04/11:38:09', '20240304113809', 4, 1),
(17, 20, 200, '2024/03/04/11:40:07', '20240304114007', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `ventrada`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `ventrada` (
`CODIGO_ENTRADA` bigint(20)
,`CODIGO_PRODUTO` bigint(20)
,`MEDICAMENTO` varchar(200)
,`DESCRICAO` varchar(255)
,`CATEGORIA` varchar(60)
,`PRECO` varchar(100)
,`QUANTIDADE` int(11)
,`DATA_ENTRADA` datetime
,`CADUCIDADE` date
,`CODIGO_FUNCIONARIO` bigint(20)
,`NOME_FUNCIONARIO` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vvenda`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vvenda` (
`datavenda` varchar(255)
,`idf` bigint(20)
,`codigop` bigint(20)
,`codigov` bigint(20)
,`nome` varchar(200)
,`descricao` varchar(255)
,`categoria` varchar(60)
,`quantidade` int(11)
,`totalcompra` int(11)
,`fatura` varchar(22)
,`nomef` varchar(100)
,`preco` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura para view `ventrada`
--
DROP TABLE IF EXISTS `ventrada`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ventrada`  AS SELECT `e`.`ide` AS `CODIGO_ENTRADA`, `p`.`idp` AS `CODIGO_PRODUTO`, `p`.`nome` AS `MEDICAMENTO`, `p`.`descricao` AS `DESCRICAO`, `p`.`categoria` AS `CATEGORIA`, `e`.`preco` AS `PRECO`, `e`.`qtd` AS `QUANTIDADE`, `e`.`dataentrada` AS `DATA_ENTRADA`, `e`.`caducidade` AS `CADUCIDADE`, `f`.`idf` AS `CODIGO_FUNCIONARIO`, `f`.`nome` AS `NOME_FUNCIONARIO` FROM ((`entrada` `e` join `funcionario` `f` on(`e`.`idf` = `f`.`idf`)) join `produto` `p` on(`e`.`idp` = `p`.`idp`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `vvenda`
--
DROP TABLE IF EXISTS `vvenda`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vvenda`  AS SELECT `v`.`datavenda` AS `datavenda`, `f`.`idf` AS `idf`, `p`.`idp` AS `codigop`, `v`.`idv` AS `codigov`, `p`.`nome` AS `nome`, `p`.`descricao` AS `descricao`, `p`.`categoria` AS `categoria`, `v`.`qtdrequerida` AS `quantidade`, `v`.`totalCompra` AS `totalcompra`, `v`.`fatura` AS `fatura`, `f`.`nome` AS `nomef`, `e`.`preco` AS `preco` FROM (((`venda` `v` join `produto` `p` on(`v`.`idp` = `p`.`idp`)) join `funcionario` `f` on(`v`.`idf` = `f`.`idf`)) join `entrada` `e` on(`p`.`idp` = `e`.`idp`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`ide`),
  ADD UNIQUE KEY `idp_2` (`idp`),
  ADD KEY `idp` (`idp`),
  ADD KEY `idf` (`idf`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idf`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `idf` (`idf`);

--
-- Índices de tabela `rastreioe`
--
ALTER TABLE `rastreioe`
  ADD PRIMARY KEY (`idR`),
  ADD KEY `idp` (`idp`),
  ADD KEY `idf` (`idf`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idv`),
  ADD KEY `idf` (`idf`),
  ADD KEY `idp` (`idp`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `entrada`
--
ALTER TABLE `entrada`
  MODIFY `ide` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idf` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idp` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `rastreioe`
--
ALTER TABLE `rastreioe`
  MODIFY `idR` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `idv` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `produto` (`idp`),
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`idf`) REFERENCES `funcionario` (`idf`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idf`) REFERENCES `funcionario` (`idf`);

--
-- Restrições para tabelas `rastreioe`
--
ALTER TABLE `rastreioe`
  ADD CONSTRAINT `rastreioe_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `produto` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rastreioe_ibfk_2` FOREIGN KEY (`idf`) REFERENCES `funcionario` (`idf`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idf`) REFERENCES `funcionario` (`idf`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`idp`) REFERENCES `produto` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
