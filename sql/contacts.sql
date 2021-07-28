/*Comentario en SQL
SQL_ Structure Query Language (lenguage estructurado de consulta)

Existen 2 tipos de sentencias SQL:
1)Sentencias Estructurales: Son las que nos permitirán crear, modificar o eliminar objetos, usuarios, y propiedades de nuestra BD
2)Sentencias de Datos: Son las que nos permitirán insertar, eliminar, modificar y buscar información en nuestra BD

MySQL 2 tipos de engine para tablas:
1) MyISAM - Tablas planas, como si fuera excel
2) InnoDB - Tablas relacionales, como si fuera access*/
CREATE DATABASE contacts;

USE contacts;

CREATE TABLE user(
    email VARCHAR(50) NOT NULL,
    name_user VARCHAR(50) NOT NULL,
    sex CHAR(1),
    birth DATE,
    phone VARCHAR(15),
    country VARCHAR(50) NOT NULL,
    photo VARCHAR(100),
    PRIMARY KEY(email),
    FULLTEXT KEY search(email,name_user,sex,phone,country)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE country(
    id_country INT NOT NULL AUTO_INCREMENT,
    name_country VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_country)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO country(id_country,name_country) VALUES
    (1,"México"),
	(2,"Colombia"),
	(3,"Guatemala"),
	(4,"España"),
	(5,"Brasil"),
	(6,"Uruguay"),
	(7,"Perú"),
	(8,"Argentina"),
	(9,"Chile"),
	(10,"Paraguay"),
	(11,"Honduras"),
	(12,"El Salvador"),
	(13,"Nicaragua"),
	(14,"Costa Rica"),
	(15,"Panamá"),
	(16,"Venezuela"),
	(17,"Ecuador"),
	(18,"Bolivia"),
	(19,"Canada"),
	(20,"Estados Unidos"),
	(21,"Groenlandia"),
	(22,"República Dominicana"),
	(23,"Haití"),
	(24,"Cuba"),
	(25,"Belice"),
	(26,"Inglaterra"),
	(27,"Francia"),
	(28,"Alemania"),
	(29,"Italia"),
	(30,"Japón"),
	(31,"China"),
	(32,"Egipto"),
	(33,"Sudafrica"),
	(34,"Australia"),
	(35,"Nueva Zelanda");