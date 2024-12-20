CREATE TABLE medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especialidade VARCHAR(100) NOT NULL,
    crm VARCHAR(20) NOT NULL
);

CREATE TABLE plano_saude( 
    id_plano INT AUTO_INCREMENT PRIMARY KEY, 
    nome_plano VARCHAR(20) NOT NULL, 
    corbertura VARCHAR(20) NOT NULL, 
    mensalidade DECIMAL(10,2) NOT NULL
    );

CREATE TABLE localizacao( 
    id_localizacao INT AUTO_INCREMENT PRIMARY KEY, 
    nome_local VARCHAR(255) NOT NULL, 
    capacidade INT NOT NULL
    );

CREATE TABLE item ( 
    id_item INT AUTO_INCREMENT PRIMARY KEY, 
    nome_item VARCHAR(100), 
    descricao VARCHAR(255), 
    preco DECIMAL(10,2), 
    quantidade INT NOT NULL );

CREATE TABLE paciente(
    id_paciente INT IDENTITY(1,1) NOT NULL,
    id_paciente_plano INT, -- FK para plano_saude
    PRIMARY KEY(id_paciente),
    FOREIGN KEY (id_paciente_plano) REFERENCES plano_saude(id_plano)
);

CREATE TABLE recepcionista (
    id_recepcionista INT IDENTITY(1,1) NOT NULL,
    PRIMARY KEY(id_recepcionista)
);

CREATE TABLE consulta(
    id_consulta INT IDENTITY(1,1) NOT NULL,
    data_consulta DATE NOT NULL,
    observacao JSON,
    preco DECIMAL(10,2),
    id_consulta_medico INT, -- Adicionado para a FK
    id_consulta_paciente INT, -- Adicionado para a FK
    id_consulta_recepcionista INT, -- Adicionado para a FK
    PRIMARY KEY(id_consulta),
    FOREIGN KEY (id_consulta_medico) REFERENCES medico(id_medico),
    FOREIGN KEY (id_consulta_paciente) REFERENCES paciente(id_paciente),
    FOREIGN KEY (id_consulta_recepcionista) REFERENCES recepcionista(id_recepcionista)
);

CREATE TABLE participante(
    id_participante INT IDENTITY(1,1) NOT NULL,
    id_inscricao_evento INT, -- fk para fazer referencia a inscriçao -- 
    PRIMARY KEY(id_participante),
    FOREIGN KEY (id_inscricao_evento) REFERENCES inscricao(id_inscricao)
);

CREATE TABLE localizacao(
    id_localizacao INT IDENTITY(1,1) NOT NULL,
    nome_local VARCHAR(255) NOT NULL,
    capacidade INT NOT NULL,
    PRIMARY KEY(id_localizacao)
);

CREATE TABLE evento(
    id_evento INT IDENTITY(1,1) NOT NULL,
    nome_evento VARCHAR(255) NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE,
    tipo_evento VARCHAR(100) NOT NULL,
    localizacao_evento INT, -- Adicionado para a FK
    PRIMARY KEY(id_evento),
    FOREIGN KEY (localizacao_evento) REFERENCES localizacao(id_localizacao)
);

CREATE TABLE inscricao(
    id_inscricao INT IDENTITY(1,1) NOT NULL,
    data_inscricao DATE NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    id_inscricao_evento INT, -- Adicionado para a FK
    PRIMARY KEY(id_inscricao),
    FOREIGN KEY (id_inscricao_evento) REFERENCES evento(id_evento)
);

CREATE TABLE client_restaurante(
    id_cliente INT IDENTITY(1,1) NOT NULL,
    PRIMARY KEY(id_cliente)
);

CREATE TABLE mesa (
    id_mesa INT IDENTITY(1,1) NOT NULL,
    capacidade INT NOT NULL,
    PRIMARY KEY(id_mesa)
);

CREATE TABLE pedido ( --na vdd é item--
    id_pedido INT IDENTITY(1,1) NOT NULL,
    data_pedido DATE NOT NULL,
    preco_total DECIMAL(10,2),
    id_pedido_cliente INT, -- Adicionado para a FK
    PRIMARY KEY(id_pedido),
    FOREIGN KEY (id_pedido_cliente) REFERENCES client_restaurante(id_cliente)
);

CREATE TABLE para_viagem (
   endereco VARCHAR(255),
   id_para_viagem INT, -- Adicionado para a FK
   FOREIGN KEY (id_para_viagem) REFERENCES pedido(id_pedido)
);

CREATE TABLE consumo_local (
   id_consumo_pedido INT, -- Adicionado para a FK
   id_consumo_mesa INT, -- Adicionado para a FK
   FOREIGN KEY (id_consumo_pedido) REFERENCES pedido(id_pedido),
   FOREIGN KEY (id_consumo_mesa) REFERENCES mesa(id_mesa)
);

CREATE TABLE garcom (
   id_garcom INT IDENTITY(1,1) NOT NULL,
   PRIMARY KEY(id_garcom)
);

CREATE TABLE estabelecimento (
   id_estabelecimento INT IDENTITY(1,1) NOT NULL,
   nome VARCHAR(255),
   setor INT NOT NULL,
   PRIMARY KEY(id_estabelecimento)
);

CREATE TABLE funcionario (
   id_funcionario INT IDENTITY(1,1) NOT NULL,
   salario DECIMAL(10,2) NOT NULL,
   setor INT NOT NULL,
   status BOOLEAN,
   id_estabelecimento_func INT, -- Adicionado para a FK
   PRIMARY KEY(id_funcionario),
   FOREIGN KEY (id_estabelecimento_func) REFERENCES estabelecimento(id_estabelecimento)
);

CREATE TABLE cliente (
   data_da_ultima_visita DATE NOT NULL,
   id_cliente VARCHAR(11) ,
   pontos INT NOT NULL,
   FOREIGN KEY (id_cliente) REFERENCES registro(CPF)
);

CREATE TABLE registro (
   nome VARCHAR(255) NOT NULL,
   data_de_nascimento DATE NOT NULL,
   CPF VARCHAR(11) NOT NULL,
   email VARCHAR(255) NOT NULL,
   telefone VARCHAR(11) NOT NULL,
   PRIMARY KEY(CPF)
);

CREATE TABLE agendar_consulta (
   fk_recepcionista_id_recepcionista INT,
   fk_paciente_id_paciente INT,
   FOREIGN KEY(fk_recepcionista_id_recepcionista) REFERENCES recepcionista(id_recepcionista),
   FOREIGN KEY(fk_paciente_id_paciente) REFERENCES paciente(id_paciente)
);

CREATE TABLE inscrever_se (
   fk_participante_id_participante INT,
   fk_inscricao_id_inscricao INT,
   FOREIGN KEY(fk_participante_id_participante) REFERENCES participante(id_participante),
   FOREIGN KEY(fk_inscricao_id_inscricao) REFERENCES inscricao(id_inscricao)
);

CREATE TABLE senta (
   fk_mesa_id_mesa INT,
   fk_cliente_restaurante_id_cliente INT,
   FOREIGN KEY(fk_mesa_id_mesa) REFERENCES mesa(id_mesa),
   FOREIGN KEY(fk_cliente_restaurante_id_cliente) REFERENCES client_restaurante(id_cliente)
);

CREATE TABLE compoe (
   fk_item_id_item INT,
   fk_pedido_id_pedido INT,
   FOREIGN KEY(fk_item_id_item) REFERENCES item(id_item),
   FOREIGN KEY(fk_pedido_id_pedido) REFERENCES pedido(id_pedido)
);

CREATE TABLE atende (
   fk_garcom_id_garcom INT,
   fk_mesa_id_mesa INT,
   FOREIGN KEY(fk_garcom_id_garcom) REFERENCES garcom(id_garcom),
   FOREIGN KEY(fk_mesa_id_mesa) REFERENCES mesa(id_mesa)
);


--Perguntas--

--1- Como identificar qual é o estabelecimento com a maior frequencia de visitantes?--
SELECT e.nome, COUNT(*) AS frequencia
FROM estabelecimento e
JOIN funcionario f ON e.id_estabelecimento = f.id_estabelecimento_func
GROUP BY e.nome
ORDER BY frequencia DESC
LIMIT 1;  

-- 2-Quais pedidos são para comer dentro e fora do shopping? --

SELECT p.id_pedido, 
       CASE 
           WHEN cl.id_cliente IS NOT NULL THEN 'Para Comer Dentro'
           ELSE 'Para Viagem'
       END AS tipo_pedido
FROM pedido p
LEFT JOIN consumo_local cl ON p.id_pedido = cl.id_consumo_pedido;

--3- Como relacionar clientes frequentes utilizando o programa de fidelidade? --
SELECT r.CPF, COUNT(c.id_cliente) AS frequencia_visitas
FROM registro r
JOIN cliente c ON r.CPF = c.id_cliente
WHERE c.pontos > 0
GROUP BY r.CPF
ORDER BY frequencia_visitas DESC;

--4-Quais são os pedidos que mais saem--

 SELECT id_pedido,COUNT(id_pedido) as qtd
 FROM pedido
 GROUP by id_pedido
 ORDER by qtd DESC;
--5- Qual a quantidade media de pessoa por evento --

 SELECT AVG(contagem_participantes) AS media_participantes
 FROM (
    SELECT id_inscricao_evento, COUNT(id_inscricao) AS contagem_participantes
    FROM inscricao
    GROUP BY id_inscricao_evento
  ) ;

--6- A frequencia de visitantes é maior quando tem eventos --
SELECT  c.data_da_ultima_visita,visitas_por_dia.quantidade_visitas,
    CASE 
        WHEN visitas_por_dia.quantidade_visitas > (SELECT AVG(quantidade_visitas) FROM (
                                                   SELECT data_da_ultima_visita, COUNT(*) AS quantidade_visitas
                                                   FROM clientes
                                                   GROUP BY data_da_ultima_visita
                                                   ) AS media_calculo) 
        THEN 'true'
        ELSE 'false'
    END AS acima_da_media
FROM 
    clientes c
JOIN 
    (SELECT data_da_ultima_visita, COUNT(*) AS quantidade_visitas
     FROM clientes
     GROUP BY data_da_ultima_visita) AS visitas_por_dia
     ON c.data_da_ultima_visita = visitas_por_dia.data_da_ultima_visita
ORDER BY 
    c.data_da_ultima_visita;
 

-- 7-As comidas saem mais em dias de eventos são diferentes dos dias que não tem eventos? --

SELECT i.descricao, (e.id_evento IS NOT NULL) AS dia_evento, COUNT(*) AS quantidade_vendida
FROM pedido AS p
LEFT JOIN compoe AS c ON p.id_pedido = c.fk_pedido_id_pedido
LEFT JOIN item AS i ON c.fk_item_id_item = i.id_item
LEFT JOIN evento AS e ON p.data_pedido BETWEEN e.data_inicio AND e.data_fim
GROUP BY i.descricao, (e.id_evento IS NOT NULL)
ORDER BY quantidade_vendida DESC, i.descricao;

-- 8-Em dia de eventos aumenta o movimento na unidade médica? --

SELECT e.id_evento IS NOT NULL AS dia_com_evento, COUNT(c.id_consulta) AS total_consultas
FROM consulta AS c
LEFT JOIN evento AS e ON c.data_consulta BETWEEN e.data_inicio AND e.data_fim
GROUP BY e.id_evento IS NOT NULL
ORDER BY dia_com_evento DESC;

-- 9-Quais são os planos de saúde mais cogitados?

SELECT ps.nome_plano, ps.corbertura, COUNT(p.id_paciente) AS total_pacientes
FROM plano_saude AS ps
LEFT JOIN paciente AS p ON ps.id_plano = p.id_paciente_plano
GROUP BY ps.id_plano, ps.nome_plano, ps.corbertura
ORDER BY total_pacientes DESC;



-- 10-Quais são os pedidos que mais saem para viagem?

SELECT i.descricao,COUNT(c.fk_item_id_item) AS quantidade_pedidos_para_viagem
FROM item AS i 
JOIN compoe AS c ON i.id_item = c.fk_item_id_item 
JOIN para_viagem AS pv ON c.fk_pedido_id_pedido = pv.id_para_viagem
GROUP BY i.id_item, i.descricao
ORDER BY quantidade_pedidos_para_viagem DESC;