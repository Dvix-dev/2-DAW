<?php
// Importación de funciones
include '../../php/globalFunc.php';

// Conectar a la base de datos
$bdd_cocina = bdd_connect();

// Recoger datos de la URL
$cod = $_GET['cod'];

// Añadir receta a la base de datos
$query = "DELETE FROM categorias WHERE Cod_categoria = $cod";
$stmt = $bdd_cocina->prepare($query);
$stmt->execute();

header("Location: ../index.php?edit=categories");
exit;