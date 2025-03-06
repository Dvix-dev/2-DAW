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
INSERT INTO Categorias (nombre, descripcion) VALUES
('Verduras', 'Recetas con base de verduras.'),
('Arroces', 'Platos que tienen arroz como ingrediente principal.'),
('Guisos', 'Platos cocinados con caldos.'),
('Postres', 'Dulces y postres de todo tipo.'),
('Bebidas', 'Bebidas de todo tipo.');

-- Inserción de recetas de ejemplo
INSERT INTO Recetas (nombre, descripcion, foto, documento_pdf, tiempo) VALUES
('Arroz con verduras', 'Un plato de arroz con verduras.', 'arroz_con_verduras.jpg', 'arroz_con_verduras.pdf', 30),
('Gazpacho', 'Una sopa fría de tomate.', 'gazpacho.jpg', 'gazpacho.pdf', 15),
('Tarta de manzana', 'Una tarta de manzana casera.', 'tarta_de_manzana.jpg', 'tarta_de_manzana.pdf', 60);

-- Inserción de las categorias asociadas a las recetas
INSERT INTO Recetas_Categorias (Cod_receta, Cod_categoria) VALUES
(1, 2),
(1, 1),
(2, 1),
(2, 3),
(3, 4);
