-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Ago-2024 às 00:15
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `horizontes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `destinos`
--

CREATE TABLE `destinos` (
  `id_destino` int(11) NOT NULL,
  `nome_destino` varchar(100) NOT NULL,
  `pais_destino` varchar(100) NOT NULL,
  `cidade_destino` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `destinos`
--

INSERT INTO `destinos` (`id_destino`, `nome_destino`, `pais_destino`, `cidade_destino`) VALUES
(2, 'Pacote universitário IFSC', 'Brasil', 'Chapecó');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacotesviagem`
--

CREATE TABLE `pacotesviagem` (
  `id_pacote` int(11) NOT NULL,
  `nome_pacote` varchar(100) NOT NULL,
  `valor_pacote` decimal(10,2) NOT NULL,
  `dias_pacote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacotesviagem`
--

INSERT INTO `pacotesviagem` (`id_pacote`, `nome_pacote`, `valor_pacote`, `dias_pacote`) VALUES
(2, 'PACOTE', '1000.00', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id_servico` int(11) NOT NULL,
  `nome_servico` varchar(100) NOT NULL,
  `valor_servico` decimal(10,2) NOT NULL,
  `descricao_servico` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id_servico`, `nome_servico`, `valor_servico`, `descricao_servico`) VALUES
(1, 'Limpeza', '50000.00', 'Limpei');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_usuario`, `telefone`, `email`, `password`) VALUES
(1, 'admin12', '49912345674', 'admin@gmail.com', '1234'),
(3, 'eduardo', '49999999999', 'eduardo@gmail.com', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_destino`);

--
-- Índices para tabela `pacotesviagem`
--
ALTER TABLE `pacotesviagem`
  ADD PRIMARY KEY (`id_pacote`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pacotesviagem`
--
ALTER TABLE `pacotesviagem`
  MODIFY `id_pacote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
