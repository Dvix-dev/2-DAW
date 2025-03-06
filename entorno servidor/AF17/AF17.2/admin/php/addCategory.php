<?php
// Importación de funciones
include '../../php/globalFunc.php';

// Conectar a la base de datos
$bdd_cocina = bdd_connect();

// Recoger datos del formulario
$name = trim(htmlspecialchars($_POST['categoryName']));
$description = htmlspecialchars($_POST['categoryDescription']);

// Añadir receta a la base de datos
$query = "INSERT INTO categorias (nombre, descripcion) VALUES (:nombre, :descripcion)";
$stmt = $bdd_cocina->prepare($query);
$stmt->bindParam(':nombre', $name);
$stmt->bindParam(':descripcion', $description);
$stmt->execute();

header("Location: ../index.php?edit=categories");
exit;