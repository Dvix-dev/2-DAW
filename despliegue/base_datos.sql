CREATE DATABASE IF NOT EXISTS alumnos_db;

USE alumnos_db;

CREATE TABLE IF NOT EXISTS alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(100), 
    email VARCHAR(100)
);

INSERT INTO alumnos (nombre, email) VALUES ('Juan Pérez', 'juan@example.com');
INSERT INTO alumnos (nombre, email) VALUES ('Ana García', 'ana@example.com');
INSERT INTO alumnos (nombre, email) VALUES ('David Escutia', 'contacto@dvix.es');