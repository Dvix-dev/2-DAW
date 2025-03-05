-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS cocina;
USE cocina;

-- Tabla para las recetas
CREATE TABLE Recetas (
    Cod_receta INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    descripcion VARCHAR(255),
    foto VARCHAR(255),
    documento_pdf VARCHAR(255),
    tiempo INT
);

-- Tabla para las categorías
CREATE TABLE Categorias (
    Cod_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) UNIQUE,
    descripcion VARCHAR(255)
);

-- Tabla intermedia de Recetas y Categorias
CREATE TABLE Recetas_Categorias (
    Cod_receta INT,
    Cod_categoria INT,
    PRIMARY KEY (Cod_receta, Cod_categoria),
    FOREIGN KEY (Cod_receta) REFERENCES Receta(Cod_receta),
    FOREIGN KEY (Cod_categoria) REFERENCES Categoria(Cod_categoria)
);

-- Inserción de las categorías
INSERT INTO Categoria (nombre, descripcion) VALUES
('Verduras', 'Recetas con base de verduras.'),
('Arroces', 'Platos que tienen arroz como ingrediente principal.'),
('Guisos', 'Platos cocinados con caldos.'),
('Postres', 'Dulces y postres de todo tipo.'),
('Bebidas', 'Bebidas de todo tipo.');