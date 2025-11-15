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
