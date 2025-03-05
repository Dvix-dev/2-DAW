<?php
// Importación de funciones
include 'globalFunc.php';

// Conectar a la base de datos
$bdd_cocina = bdd_connect();

// Variables
$filter = "";

if (isset($_POST['nameFilter'])){
    // Extraer el filtro de nombre
    $nameFilter = strtolower(trim($_POST['nameFilter']));
}

if (isset($_POST['filterCategory'])){
    // Extraer el filtro de categoría(s)
    $categoryFilter = $_POST['filterCategory'];
}

// Conseguir tabla intermedia
$query = "SELECT * FROM recetas_categorias";
$stmt = $bdd_cocina->prepare($query);
$stmt->execute();
$recetas_categorias = $stmt->fetchAll();

// Inicializar arrays
$arr_recetas_categorias = [];
$arr_filtered_cat = [];

// Procesar la tabla intermedia
foreach ($recetas_categorias as $receta_categoria){
    $arr_recetas_categorias[$receta_categoria[0]][] = $receta_categoria[1];
}

// Consulta por nombre
$query = "SELECT `Cod_receta` FROM recetas WHERE `nombre` LIKE '%$nameFilter%' ORDER BY `Cod_receta` ASC";
$stmt = $bdd_cocina->prepare($query);
$stmt->execute();
$arr_filtered_name = $stmt->fetchAll();

// Simplificar el array de nombres
$arr_filtered_name_ids = array_column($arr_filtered_name, 'Cod_receta');

// Filtrar por categorías
if (isset($_POST['filterCategory'])){
    foreach ($arr_recetas_categorias as $recipe_id => $categories){
        if (count(array_intersect($categories, $categoryFilter)) === count($categoryFilter)){
            $arr_filtered_cat[] = $recipe_id;
        }
    }
}

// Comprobaar y comparar las coincidencias entre filtros
if (!empty($arr_filtered_name_ids) && !empty($arr_filtered_cat)){
    $arr_filtered = array_intersect($arr_filtered_name_ids, $arr_filtered_cat);
} elseif (!empty($arr_filtered_name_ids)){
    $arr_filtered = $arr_filtered_name_ids;
} elseif (!empty($arr_filtered_cat)){
    $arr_filtered = $arr_filtered_cat;
} else {
    $arr_filtered = [];
}

// Generar el filtro string en una variable formateada para la URL
$filter = implode(",", $arr_filtered);

header("Location: ../index.php?filtered=true&filter=$filter");
exit;