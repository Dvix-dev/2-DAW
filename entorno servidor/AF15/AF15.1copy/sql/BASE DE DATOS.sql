CREATE DATABASE Prueba;

USE Prueba;

CREATE TABLE Plantas (
    codplanta VARCHAR(5) PRIMARY KEY,
    nombre VARCHAR(50),
    f_plantacion DATE,
    n_ejemplares INTEGER
);

INSERT INTO Plantas (codplanta, nombre, f_plantacion, n_ejemplares) VALUES
    ('P0001', 'Manzano', '2010-10-20', 30),
    ('P0002', 'Peral', '2011-09-15', 2),
    ('P0003', 'Algarrobo', '2005-07-01', 3);
