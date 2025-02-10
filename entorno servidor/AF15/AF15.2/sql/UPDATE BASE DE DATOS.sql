CREATE DATABASE Prueba;

USE Prueba;

CREATE TABLE Usuarios (
    nombre CHAR(50) PRIMARY KEY,
    clave CHAR(60)
);

INSERT INTO Usuarios (nombre, clave) VALUES
    ('David', '1234'),
    ('Antonio', '4321'),
    ('Pedro', 'abcd');