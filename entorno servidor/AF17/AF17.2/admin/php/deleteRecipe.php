<?php
// Importación de funciones
include '../../php/globalFunc.php';

// Conectar a la base de datos
$bdd_cocina = bdd_connect();

// Recoger datos de la URL
$id = $_GET['id'];

// Añadir receta a la base de datos
$query = "DELETE FROM recetas WHERE Cod_receta = $id";
$stmt = $bdd_cocina->prepare($query);
$stmt->execute();

header("Location: ../index.php?edit=recipes");
exit;