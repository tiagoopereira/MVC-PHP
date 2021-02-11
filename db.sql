CREATE TABLE carros (
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome VARCHAR(255)
);

CREATE TABLE reservas (
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_carro INT NOT NULL,
	data_inicio DATE,
	data_fim DATE,
	nome_reservante VARCHAR(255),
	FOREIGN KEY (id_carro) REFERENCES carros (id)
);