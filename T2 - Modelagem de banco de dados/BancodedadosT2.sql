<<<<<<< HEAD
CREATE DATABASE IF NOT EXISTS BancodedadosT2;
USE BancodedadosT2;

-- =============================
--      TABELA CLIENTE
-- =============================
CREATE TABLE Cliente (
    id_cliente SERIAL PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL,
    cpf_cliente CHAR(11) NOT NULL,
    telefone_cliente VARCHAR(15) NOT NULL
) ENGINE=InnoDB;

-- ====== INSERTS CLIENTE ======
INSERT INTO Cliente (nome_cliente, cpf_cliente, telefone_cliente) VALUES
('Fernando',        '01000000000', '11900000000'),
('Kauan',           '92000000000', '11910000000'),
('William',         '93000000000', '11920000000'),
('João da Silva',   '12345678900', '11987654321'),
('Limpano da Silva','98014528390', '11978654092');

-- =============================
--      TABELA FUNCOES
-- =============================
CREATE TABLE Funcoes (
    id_funcoes INT AUTO_INCREMENT PRIMARY KEY,
    nome_funcao VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

-- ====== INSERTS FUNCOES ======
INSERT INTO Funcoes (nome_funcao) VALUES
('MECÂNICO'),
('AUXILIAR DE MECÂNICO'),
('ELETRICISTA'),
('TECNICO EM INJEÇÃO ELETRÔNICA'),
('ALINHADOR'),
('TECNICO EM AR-CONDICIONADO'),
('FUNILEIRO'),
('PINTOR');

-- =============================
--      TABELA FUNCIONARIO
-- =============================
CREATE TABLE Funcionario (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome_funcionario VARCHAR(50),
    telefone_funcionario VARCHAR(15),
    id_funcoes INT,
    CONSTRAINT fk_funcionario_funcao
        FOREIGN KEY (id_funcoes)
        REFERENCES Funcoes(id_funcoes)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ====== INSERTS FUNCIONARIO ======
INSERT INTO Funcionario (nome_funcionario, telefone_funcionario, id_funcoes) VALUES
('Kauana',         '11900000000', 1),
('Dias',           '11900000000', 2),
('Rafa',           '11900000000', 3),
('Lucas Pereira',  '11987654321', 3),
('André Pereira',  '11992878769', 5);

-- =============================
--      TABELA VEICULO
-- =============================
CREATE TABLE Veiculo (
    placa_carro CHAR(8) PRIMARY KEY,
    id_cliente INT,

    CONSTRAINT fk_veiculo_cliente
        FOREIGN KEY (id_cliente)
        REFERENCES Cliente(id_cliente)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ====== INSERTS VEICULO ======
INSERT INTO Veiculo (placa_carro, id_cliente) VALUES
('AJI1234', 1),
('AQP1N12', 1),
('BBQP1N12', 2),
('CQP1N12', 3),
('ADO1N22', 9);

-- =============================
--      TABELA TRIAGEM
-- =============================
CREATE TABLE Triagem (
    id_triagem INT AUTO_INCREMENT PRIMARY KEY,
    problema TEXT,
    data_triagem DATE,
    placa_carro CHAR(8),
    id_funcionario INT,

    CONSTRAINT fk_triagem_carro
        FOREIGN KEY (placa_carro)
        REFERENCES Veiculo(placa_carro)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_triagem_funcionario
        FOREIGN KEY (id_funcionario)
        REFERENCES Funcionario(id_funcionario)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- (sem inserts antigos — tabela estava vazia)


-- =============================
--      TABELA ORDEM DE SERVIÇO
-- =============================
CREATE TABLE Ordem_de_servico (
    id_ordem_de_servico INT AUTO_INCREMENT PRIMARY KEY,
    valor_servico DOUBLE,
    status_servico VARCHAR(50),
    placa_carro CHAR(8),
    id_triagem INT,
    id_funcionario INT,

    CONSTRAINT fk_os_carro
        FOREIGN KEY (placa_carro)
        REFERENCES Veiculo(placa_carro)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_os_triagem
        FOREIGN KEY (id_triagem)
        REFERENCES Triagem(id_triagem)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_os_funcionario
        FOREIGN KEY (id_funcionario)
        REFERENCES Funcionario(id_funcionario)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- (sem inserts antigos — tabela estava vazia)
=======
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2025 at 01:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BancodedadosT2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
--

CREATE TABLE `Cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` text NOT NULL,
  `cpf_cliente` char(12) NOT NULL,
  `telefone_cliente` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Cliente`
--

INSERT INTO `Cliente` (`id_cliente`, `nome_cliente`, `cpf_cliente`, `telefone_cliente`) VALUES
(1, 'Fernando', '1000000000', '11900000000'),
(2, 'Kauan', '92000000000', '11910000000'),
(3, 'William', '93000000000', '11920000000');

-- --------------------------------------------------------

--
-- Table structure for table `Funcionario`
--

CREATE TABLE `Funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` char(50) DEFAULT NULL,
  `telefone_funcionario` char(12) DEFAULT NULL,
  `id_funcoes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Funcionario`
--

INSERT INTO `Funcionario` (`id_funcionario`, `nome_funcionario`, `telefone_funcionario`, `id_funcoes`) VALUES
(1, 'Kauana', '11900000000', 1),
(2, 'Dias', '11900000000', 2),
(3, 'Rafa', '11900000000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Funcoes`
--

CREATE TABLE `Funcoes` (
  `id_funcoes` int(11) NOT NULL,
  `nome_funcao` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Funcoes`
--

INSERT INTO `Funcoes` (`id_funcoes`, `nome_funcao`) VALUES
(1, 'MECÂNICO'),
(2, 'AUXILIAR DE MECÂNICO'),
(3, 'ELETRICISTA'),
(4, 'TECNICO EM INJEÇÃO ELETRÔNICA'),
(5, 'ALINHADOR'),
(6, 'TECNICO EM AR-CONDICIONADO'),
(7, 'FUNILEIRO'),
(8, 'PINTOR');

-- --------------------------------------------------------

--
-- Table structure for table `Ordem_de_servico`
--

CREATE TABLE `Ordem_de_servico` (
  `id_ordem_de_servico` int(11) NOT NULL,
  `valor_servico` double DEFAULT NULL,
  `status_servico` text DEFAULT NULL,
  `placa_carro` char(8) DEFAULT NULL,
  `id_triagem` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Triagem`
--

CREATE TABLE `Triagem` (
  `id_triagem` int(11) NOT NULL,
  `problema` text DEFAULT NULL,
  `data_triagem` date DEFAULT NULL,
  `placa_carro` char(8) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Veiculo`
--

CREATE TABLE `Veiculo` (
  `placa_carro` char(8) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Veiculo`
--

INSERT INTO `Veiculo` (`placa_carro`, `id_cliente`) VALUES
('AQP1N12', 1),
('BBQP1N12', 2),
('CQP1N12', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `Funcionario`
--
ALTER TABLE `Funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `id_funcoes` (`id_funcoes`);

--
-- Indexes for table `Funcoes`
--
ALTER TABLE `Funcoes`
  ADD PRIMARY KEY (`id_funcoes`);

--
-- Indexes for table `Ordem_de_servico`
--
ALTER TABLE `Ordem_de_servico`
  ADD PRIMARY KEY (`id_ordem_de_servico`),
  ADD KEY `placa_carro` (`placa_carro`),
  ADD KEY `id_triagem` (`id_triagem`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `Triagem`
--
ALTER TABLE `Triagem`
  ADD PRIMARY KEY (`id_triagem`),
  ADD KEY `placa_carro` (`placa_carro`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `Veiculo`
--
ALTER TABLE `Veiculo`
  ADD PRIMARY KEY (`placa_carro`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Funcionario`
--
ALTER TABLE `Funcionario`
  ADD CONSTRAINT `Funcionario_ibfk_1` FOREIGN KEY (`id_funcoes`) REFERENCES `Funcoes` (`id_funcoes`);

--
-- Constraints for table `Ordem_de_servico`
--
ALTER TABLE `Ordem_de_servico`
  ADD CONSTRAINT `Ordem_de_servico_ibfk_1` FOREIGN KEY (`placa_carro`) REFERENCES `Veiculo` (`placa_carro`),
  ADD CONSTRAINT `Ordem_de_servico_ibfk_2` FOREIGN KEY (`id_triagem`) REFERENCES `Triagem` (`id_triagem`),
  ADD CONSTRAINT `Ordem_de_servico_ibfk_3` FOREIGN KEY (`id_funcionario`) REFERENCES `Funcionario` (`id_funcionario`);

--
-- Constraints for table `Triagem`
--
ALTER TABLE `Triagem`
  ADD CONSTRAINT `Triagem_ibfk_1` FOREIGN KEY (`placa_carro`) REFERENCES `Veiculo` (`placa_carro`),
  ADD CONSTRAINT `id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `Funcionario` (`id_funcionario`);

--
-- Constraints for table `Veiculo`
--
ALTER TABLE `Veiculo`
  ADD CONSTRAINT `Veiculo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `Cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> 4edbcdf (primeiro commit william consultar funcionarios)
