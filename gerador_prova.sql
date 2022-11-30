-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2022 às 02:43
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerador_prova`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativas`
--

CREATE TABLE `alternativas` (
  `id` int(11) NOT NULL,
  `correta` tinyint(4) NOT NULL,
  `alternativa` text NOT NULL,
  `pergunta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alternativas`
--

INSERT INTO `alternativas` (`id`, `correta`, `alternativa`, `pergunta_id`) VALUES
(37, 1, 'MONSTRO', 114),
(38, 0, 'GORILA', 114),
(39, 0, 'PRINCIPE', 114),
(40, 0, 'SAPO', 114),
(41, 0, 'ROBO', 114),
(42, 0, 'HARRISON FORD', 115),
(43, 0, 'GERALD FORD', 115),
(44, 1, 'HENRY FORD', 115),
(45, 0, 'ANNA FORD', 115),
(46, 0, 'GEORGE FORD', 115),
(47, 0, 'FRANK SINATRA', 116),
(48, 0, 'LITTLE RICHARD', 116),
(49, 0, 'MICHAEL JACKSOM', 116),
(50, 1, 'ELVIS PRESLEY', 116),
(51, 0, 'RICHIE VALENS', 116),
(52, 0, 'DIAMANTE', 117),
(53, 1, 'PÉROLA', 117),
(54, 0, 'RUBI', 117),
(55, 0, 'SAL', 117),
(56, 0, 'ESMERALDA', 117),
(57, 1, 'ITÁLIA', 118),
(58, 0, 'MÉXICO', 118),
(59, 0, 'JAPÃO', 118),
(60, 0, 'ESTADOS UNIDOS', 118),
(61, 0, 'COREIA DO SUL', 118),
(62, 0, 'TANQUE', 119),
(63, 0, 'DIRIGÍVEL', 119),
(64, 1, 'NAVIO DE GUERRA', 119),
(65, 0, 'AVIÃO DE CAÇA', 119),
(66, 0, 'TORPEDO', 119),
(67, 0, 'SENTIR DOR', 120),
(68, 0, 'SENTIR PALADAR', 120),
(69, 0, 'SENTIR CHEIRO', 120),
(70, 1, 'DIFERENCIAR CORES', 120),
(71, 0, 'DIFERENCIAR SONS', 120),
(72, 1, 'CINCO', 121),
(73, 0, 'SETE', 121),
(74, 0, 'TRÊS', 121),
(75, 0, 'QUATRO', 121),
(76, 0, 'NOVE', 121),
(77, 0, 'NACL', 122),
(78, 0, 'H2', 122),
(79, 1, 'H2O', 122),
(80, 0, 'CO²', 122),
(81, 0, 'CO', 122),
(82, 0, 'CORREIO RÁPIDO', 123),
(83, 1, 'CORREIO ELETRÔNICO', 123),
(84, 0, 'CORREIO ELEGANTE', 123),
(85, 0, 'CORREIO DE MÁQUINA', 123),
(86, 0, 'CORREIO DO AMOR', 123),
(87, 1, 'DE 1914 Á 1918', 124),
(88, 0, 'DE 1939 Á 1945', 124),
(89, 0, 'DE 1913 Á 1917', 124),
(90, 0, 'DE 1914 Á 1917', 124),
(91, 0, 'DE 1914 Á 1916', 124),
(92, 1, 'GUERRA FRIA', 125),
(93, 0, 'GUERRA DO VIETNÃ', 125),
(94, 0, 'GUERRA NAS ESTRELAS', 125),
(95, 0, 'GUERRA DA CORÉIA', 125),
(96, 0, 'GUERRA CIVIL', 125),
(97, 0, 'LA PAZ', 126),
(98, 1, 'CUZCO', 126),
(99, 0, 'BUENOS AIRES', 126),
(100, 0, 'BOGOTÁ', 126),
(101, 0, 'ROMENIA', 126);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `pergunta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta`) VALUES
(114, 'O que era Frankenstein, de Mary Shelley?'),
(115, 'Quem fundou a fábrica de automóveis Ford?'),
(116, 'Qual cantor ficou conhecido como “o rei do rock”?'),
(117, 'Qual destes elementos se forma dentro das ostras?'),
(118, 'A cidade de Pompéia, que foi soterrada por um vulcão fica em qual desses países?'),
(119, 'O que é um contratorpedeiro?'),
(120, 'O daltônico é deficiente em?'),
(121, 'Quantos são os continentes?'),
(122, 'Qual é a fórmula química da água?'),
(123, 'O que significa a expressão e-mail?'),
(124, 'Quando aconteceu a Primeira Guerra Mundial?'),
(125, 'Que conflito ideológico envolveu os EUA e a União Soviética?'),
(126, 'Que cidade foi capital do Império Inca?');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alternativas`
--
ALTER TABLE `alternativas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pergunta_id` (`pergunta_id`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alternativas`
--
ALTER TABLE `alternativas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alternativas`
--
ALTER TABLE `alternativas`
  ADD CONSTRAINT `alternativas_ibfk_1` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
