CREATE DATABASE academia;

USE academia;

CREATE TABLE usuario(
	dni varchar(9) NOT NULL,
    apellido varchar(50) NOT NULL,
    tipo_usuario tinyint NOT NULL,
    PRIMARY KEY (dni)
);

CREATE TABLE asignatura(
	identificador int NOT NULL AUTO_INCREMENT,
    nombre varchar(30) NOT NULL,
    PRIMARY KEY (identificador)
);

CREATE TABLE nota(
	alumno varchar(9) NOT NULL,
    asignatura int,
    nota int,
    PRIMARY KEY (alumno,asignatura),
    FOREIGN KEY (alumno) REFERENCES usuario(dni) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (asignatura) REFERENCES asignatura(identificador) ON UPDATE CASCADE ON DELETE CASCADE
);
