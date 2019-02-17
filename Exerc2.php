DROP DATABASE IF EXISTS itens;
CREATE DATABASE itens;

USE itens;

CREATE TABLE marcas
(
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(10),
  pais VARCHAR(20),
  fornecedor varchar(20),  
  PRIMARY KEY(id)
);

CREATE TABLE produtos
(
  id INT NOT NULL AUTO_INCREMENT,  
  nome varchar(50),
  tipo varchar(50),
  peso double,
  id_marca int,
  PRIMARY KEY(id)
);

ALTER TABLE produtos
ADD FOREIGN KEY (id_marca) REFERENCES marcas(id);

INSERT INTO marcas(nome, pais, fornecedor) VALUES('Valfenda', 'New Zealand', 'Bill');
INSERT INTO marcas(nome, pais, fornecedor) VALUES('Adidas', 'Alemanha', 'Pascal');
INSERT INTO marcas(nome, pais, fornecedor) VALUES('Valfenda', 'USA', 'Tris');

INSERT INTO produtos(nome, tipo, peso, id_marca) VALUES('Mouse', 'A', 33.5, 1);
INSERT INTO produtos(nome, tipo, peso, id_marca) VALUES('Camiseta', 'A', 33.5, 2);
INSERT INTO produtos(nome, tipo, peso, id_marca) VALUES('TV', 'A', 33.5, 3);

select p.id, p.nome from produtos as p 
INNER JOIN marcas as m 
on m.id = p.id_marca
and m.nome = 'Valfenda';


