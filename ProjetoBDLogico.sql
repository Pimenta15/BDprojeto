/* ProjetoBDLogico: */

CREATE TABLE Paciente (
    ID_Paciente INT PRIMARY KEY,
    fk_Plano de Saúde_ID_Plano INT
);

CREATE TABLE Médico (
    ID_Medico INT PRIMARY KEY,
    CRM VARCHAR,
    Especialidade VARCHAR
);

CREATE TABLE Plano de Saúde (
    ID_Plano INT PRIMARY KEY,
    Nome_Plano VARCHAR,
    Cobertura VARCHAR,
    Mensalidade REAL
);

CREATE TABLE Consulta (
    ID_Consulta INT PRIMARY KEY,
    Data_Consulta DATE,
    Hora TIME,
    Observações VARCHAR,
    preço REAL,
    fk_Médico_ID_Medico INT,
    fk_Paciente_ID_Paciente INT,
    fk_Recepcionista_ID_Recepcionista INT
);

CREATE TABLE Recepcionista (
    ID_Recepcionista INT,
    fk_Funcionario_fk_Registro_CPF VARCHAR,
    PRIMARY KEY (ID_Recepcionista, fk_Funcionario_fk_Registro_CPF)
);

CREATE TABLE Evento (
    ID_Evento INT PRIMARY KEY,
    Nome_Evento VARCHAR,
    Data_Inicio DATE,
    Data_Fim DATE,
    Local VARCHAR,
    Tipo_Evento VARCHAR
);

CREATE TABLE Participante (
    ID_Participante INT,
    fk_Cliente _fk_Registro_CPF VARCHAR,
    PRIMARY KEY (ID_Participante, fk_Cliente _fk_Registro_CPF)
);

CREATE TABLE Local (
    ID_Local INT PRIMARY KEY,
    Nome_Local VARCHAR,
    Capacidade INT,
    Endereço VARCHAR
);

CREATE TABLE Inscrição (
    ID_Inscrição INT PRIMARY KEY,
    Data_Inscrição DATE,
    preço REAL,
    fk_Evento_ID_Evento INT
);

CREATE TABLE Cliente_Restaurante (
    ID_Cliente INT,
    fk_Cliente _fk_Registro_CPF VARCHAR,
    fk_Mesa_ID_Mesa INT,
    PRIMARY KEY (ID_Cliente, fk_Cliente _fk_Registro_CPF)
);

CREATE TABLE Mesa (
    ID_Mesa INT PRIMARY KEY,
    Capacidade INT
);

CREATE TABLE Pedido (
    ID_Pedido INT PRIMARY KEY,
    Data_Pedido DATE,
    Preço_total REAL,
    fk_Cliente_Restaurante_ID_Cliente INT
);

CREATE TABLE Item (
    ID_Item INT PRIMARY KEY,
    Descrição VARCHAR,
    Preço REAL,
    Quantidade INT
);

CREATE TABLE Para Viagem (
    Endereço VARCHAR,
    fk_Pedido_ID_Pedido INT PRIMARY KEY
);

CREATE TABLE Consumo Local (
    ID_Mesa INT,
    fk_Pedido_ID_Pedido INT PRIMARY KEY
);

CREATE TABLE Garçom (
    ID_Garçom INT,
    fk_Funcionario_fk_Registro_CPF VARCHAR,
    PRIMARY KEY (ID_Garçom, fk_Funcionario_fk_Registro_CPF)
);

CREATE TABLE Funcionario (
    Salario REAL,
    Setor VARCHAR,
    Status BOOLEAN,
    fk_Registro_CPF VARCHAR PRIMARY KEY
);

CREATE TABLE Cliente  (
    data_da_ultima_visita DATE,
    Pontos INT,
    fk_Registro_CPF VARCHAR PRIMARY KEY
);

CREATE TABLE Registro (
    Nome VARCHAR,
    data_de_nascimento DATE NOT NULL,
    CPF VARCHAR NOT NULL PRIMARY KEY,
    Email VARCHAR,
    Telefone VARCHAR
);

CREATE TABLE Agendar consulta (
    fk_Recepcionista_ID_Recepcionista INT,
    fk_Paciente_ID_Paciente INT
);

CREATE TABLE Aloca (
    fk_Local_ID_Local INT,
    fk_Evento_ID_Evento INT
);

CREATE TABLE Inscrever-se (
    fk_Participante_ID_Participante INT,
    fk_Inscrição_ID_Inscrição INT
);

CREATE TABLE Compõe (
    fk_Item_ID_Item INT,
    fk_Pedido_ID_Pedido INT
);

CREATE TABLE Atende (
    fk_Garçom_ID_Garçom INT,
    fk_Garçom_fk_Funcionario_fk_Registro_CPF VARCHAR,
    fk_Mesa_ID_Mesa INT
);
 
ALTER TABLE Paciente ADD CONSTRAINT FK_Paciente_2
    FOREIGN KEY (fk_Cliente _fk_Registro_CPF)
    REFERENCES Cliente  (fk_Registro_CPF)
    ON DELETE CASCADE;
 
ALTER TABLE Paciente ADD CONSTRAINT FK_Paciente_3
    FOREIGN KEY (fk_Plano de Saúde_ID_Plano)
    REFERENCES Plano de Saúde (ID_Plano)
    ON DELETE CASCADE;
 
ALTER TABLE Consulta ADD CONSTRAINT FK_Consulta_2
    FOREIGN KEY (fk_Médico_ID_Medico)
    REFERENCES Médico (ID_Medico)
    ON DELETE CASCADE;
 
ALTER TABLE Consulta ADD CONSTRAINT FK_Consulta_3
    FOREIGN KEY (fk_Paciente_ID_Paciente, fk_Paciente_fk_Cliente _fk_Registro_CPF???)
    REFERENCES Paciente (ID_Paciente, ???)
    ON DELETE CASCADE;
 
ALTER TABLE Consulta ADD CONSTRAINT FK_Consulta_4
    FOREIGN KEY (fk_Recepcionista_ID_Recepcionista, fk_Recepcionista_fk_Funcionario_fk_Registro_CPF)
    REFERENCES Recepcionista (ID_Recepcionista, fk_Funcionario_fk_Registro_CPF)
    ON DELETE CASCADE;
 
ALTER TABLE Recepcionista ADD CONSTRAINT FK_Recepcionista_2
    FOREIGN KEY (fk_Funcionario_fk_Registro_CPF)
    REFERENCES Funcionario (fk_Registro_CPF)
    ON DELETE CASCADE;
 
ALTER TABLE Participante ADD CONSTRAINT FK_Participante_2
    FOREIGN KEY (fk_Cliente _fk_Registro_CPF)
    REFERENCES Cliente  (fk_Registro_CPF)
    ON DELETE CASCADE;
 
ALTER TABLE Inscrição ADD CONSTRAINT FK_Inscrição_2
    FOREIGN KEY (fk_Evento_ID_Evento)
    REFERENCES Evento (ID_Evento)
    ON DELETE CASCADE;
 
ALTER TABLE Cliente_Restaurante ADD CONSTRAINT FK_Cliente_Restaurante_2
    FOREIGN KEY (fk_Cliente _fk_Registro_CPF)
    REFERENCES Cliente  (fk_Registro_CPF)
    ON DELETE CASCADE;
 
ALTER TABLE Cliente_Restaurante ADD CONSTRAINT FK_Cliente_Restaurante_3
    FOREIGN KEY (fk_Mesa_ID_Mesa)
    REFERENCES Mesa (ID_Mesa)
    ON DELETE SET NULL;
 
ALTER TABLE Pedido ADD CONSTRAINT FK_Pedido_2
    FOREIGN KEY (fk_Cliente_Restaurante_ID_Cliente, fk_Cliente_Restaurante_fk_Cliente _fk_Registro_CPF)
    REFERENCES Cliente_Restaurante (ID_Cliente, fk_Cliente _fk_Registro_CPF)
    ON DELETE RESTRICT;
 
ALTER TABLE Para Viagem ADD CONSTRAINT FK_Para Viagem_2
    FOREIGN KEY (fk_Pedido_ID_Pedido)
    REFERENCES Pedido (ID_Pedido)
    ON DELETE CASCADE;
 
ALTER TABLE Consumo Local ADD CONSTRAINT FK_Consumo Local_2
    FOREIGN KEY (fk_Pedido_ID_Pedido)
    REFERENCES Pedido (ID_Pedido)
    ON DELETE CASCADE;
 
ALTER TABLE Garçom ADD CONSTRAINT FK_Garçom_2
    FOREIGN KEY (fk_Funcionario_fk_Registro_CPF)
    REFERENCES Funcionario (fk_Registro_CPF)
    ON DELETE CASCADE;
 
ALTER TABLE Funcionario ADD CONSTRAINT FK_Funcionario_2
    FOREIGN KEY (fk_Registro_CPF)
    REFERENCES Registro (CPF)
    ON DELETE CASCADE;
 
ALTER TABLE Cliente  ADD CONSTRAINT FK_Cliente _2
    FOREIGN KEY (fk_Registro_CPF)
    REFERENCES Registro (CPF)
    ON DELETE CASCADE;
 
ALTER TABLE Agendar consulta ADD CONSTRAINT FK_Agendar consulta_1
    FOREIGN KEY (fk_Recepcionista_ID_Recepcionista, fk_Recepcionista_fk_Funcionario_fk_Registro_CPF)
    REFERENCES Recepcionista (ID_Recepcionista, fk_Funcionario_fk_Registro_CPF)
    ON DELETE SET NULL;
 
ALTER TABLE Agendar consulta ADD CONSTRAINT FK_Agendar consulta_2
    FOREIGN KEY (fk_Paciente_ID_Paciente, fk_Paciente_fk_Cliente _fk_Registro_CPF???)
    REFERENCES Paciente (ID_Paciente, ???)
    ON DELETE SET NULL;
 
ALTER TABLE Aloca ADD CONSTRAINT FK_Aloca_1
    FOREIGN KEY (fk_Local_ID_Local)
    REFERENCES Local (ID_Local)
    ON DELETE RESTRICT;
 
ALTER TABLE Aloca ADD CONSTRAINT FK_Aloca_2
    FOREIGN KEY (fk_Evento_ID_Evento)
    REFERENCES Evento (ID_Evento)
    ON DELETE SET NULL;
 
ALTER TABLE Inscrever-se ADD CONSTRAINT FK_Inscrever-se_1
    FOREIGN KEY (fk_Participante_ID_Participante, fk_Participante_fk_Cliente _fk_Registro_CPF)
    REFERENCES Participante (ID_Participante, fk_Cliente _fk_Registro_CPF)
    ON DELETE RESTRICT;
 
ALTER TABLE Inscrever-se ADD CONSTRAINT FK_Inscrever-se_2
    FOREIGN KEY (fk_Inscrição_ID_Inscrição)
    REFERENCES Inscrição (ID_Inscrição)
    ON DELETE SET NULL;
 
ALTER TABLE Compõe ADD CONSTRAINT FK_Compõe_1
    FOREIGN KEY (fk_Item_ID_Item)
    REFERENCES Item (ID_Item)
    ON DELETE RESTRICT;
 
ALTER TABLE Compõe ADD CONSTRAINT FK_Compõe_2
    FOREIGN KEY (fk_Pedido_ID_Pedido)
    REFERENCES Pedido (ID_Pedido)
    ON DELETE SET NULL;
 
ALTER TABLE Atende ADD CONSTRAINT FK_Atende_1
    FOREIGN KEY (fk_Garçom_ID_Garçom, fk_Garçom_fk_Funcionario_fk_Registro_CPF)
    REFERENCES Garçom (ID_Garçom, fk_Funcionario_fk_Registro_CPF)
    ON DELETE RESTRICT;
 
ALTER TABLE Atende ADD CONSTRAINT FK_Atende_2
    FOREIGN KEY (fk_Mesa_ID_Mesa)
    REFERENCES Mesa (ID_Mesa)
    ON DELETE SET NULL;