DROP DATABASE IF EXISTS polivalencia;
CREATE DATABASE polivalencia;

USE polivalencia;

CREATE TABLE funcionarios
(
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50),
  data_nascimento  date,
  cidade varchar(100) ,
 telefone varchar(15),
  PRIMARY KEY(id)
);

CREATE TABLE postosTrabalho
(
  id INT NOT NULL AUTO_INCREMENT,
  setor varchar(20),
  nome varchar(50),
  tipo varchar(50),    
  PRIMARY KEY(id)
);

CREATE TABLE habilitar
(
  id INT NOT NULL AUTO_INCREMENT,
  funcionario_id int,
  posto_id int,  
  data_validade date,
  PRIMARY KEY(id)
);

ALTER TABLE habilitar 
ADD FOREIGN KEY (funcionario_id) REFERENCES funcionarios(id);

ALTER TABLE habilitar 
ADD FOREIGN KEY (posto_id) REFERENCES postosTrabalho(id);

CREATE INDEX idx_dt_nasc on funcionarios(data_nascimento);
CREATE INDEX idx_tp on postosTrabalho(tipo);
CREATE INDEX idx_dt_valid on habilitar(data_validade);

