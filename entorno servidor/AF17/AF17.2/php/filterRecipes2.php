<?php
// Importación de funciones
include 'globalFunc.php';

// Conectar a la base de datos
$bdd_cocina = bdd_connect();

// Variables
$filter = [];
$filter2 = "";

if (isset($_POST['nameFilter'])){
    $nameFilter = strtolower(trim($_POST['nameFilter'])) ;
}

if (isset($_POST['filterCategory'])){
    $categoryFilter = $_POST['filterCategory'];
}

print('<br>');
print('<h1>Filtros</h1>');
print($nameFilter);
print('<br>');

// Conseguir tabla intermedia
$query = "SELECT * FROM recetas_categorias";
$stmt = $bdd_cocina->prepare($query);
$stmt->execute();
$recetas_categorias = $stmt->fetchAll();

// Consulta por nombre
$query = "SELECT `Cod_receta` FROM recetas WHERE `nombre` LIKE '%$nameFilter%' ORDER BY `recetas`.`Cod_receta` ASC";
$stmt = $bdd_cocina->prepare($query);
$stmt->execute();
$arr_filtered_name = $stmt->fetchAll();



print('<h1>Filtro categorias</h1><pre>');
// print_r($_POST['filterCategory']);
print('</pre><h1>-----------------</h1>');

// Comprobar por categorias
if (isset($_POST['filterCategory'])){
    $arr_filtered_cat = [];
    foreach ($recetas_categorias as $receta_categoria){
        // print('<h1>Receta Categoria</h1>');
        // print_r($receta_categoria);
        // print('<h1>-----------------</h1>');
        $arr_recetas_categorias[$receta_categoria[0]][] = $receta_categoria[1];
    }

    print('<h1>Recetas Categorias</h1><pre>');
    print_r($arr_recetas_categorias);
    print('</pre><h1>-----------------</h1>');
    
    foreach ($arr_recetas_categorias as $recipe_id => $categories){
        $coincident = true;
        foreach ($categories as $category){
            if (!in_array($category, $categoryFilter)){
                $coincident = false;
                break;
            }
        }
        if ($coincident){
            array_push($arr_filtered_cat, $recipe_id);
        }
    }
}

if (isset($arr_filtered_name) && isset($arr_filtered_cat)){
    $arr_filtered = [];
    echo "<h1>AAAAAAAAAAAAAAAAA POR AMBOS AAAAAAAAAAAAAAAAAAAAA</h1>";
    foreach ($arr_filtered_name as $value){
        if (in_array($value[0], $arr_filtered_cat)){
            array_push($arr_filtered, $value);
        }
    }

} else if (isset($arr_filtered_name)){
    echo "<h1>BBBBBBBBBBBBBBBBBB POR NOMBRE BBBBBBBBBBBBBBBBBBBBB</h1>";
    $arr_filtered = $arr_filtered_name;
} else if (isset($arr_filtered_cat)){
    echo "<h1>CCCCCCCCCCCCCCCCCCC POR CATEGORIA CCCCCCCCCCCCCCCCCCCCC</h1>";
    $arr_filtered = $arr_filtered_cat;
} else {
    echo "<h1>DDDDDDDDDDDDDDDDDDD TODO VACIO DDDDDDDDDDDDDDDDDD</h1>";
    $arr_filtered = [];
}

echo "<pre>";
print_r("<h1>Filtered</h1>");
print_r($arr_filtered);
echo "</pre>";  

foreach ($arr_filtered as $value){
    print_r($value[0]);
    $filter2 .= $value[0];
    if ($value != end($arr_filtered)){
        $filter2 .= ",";
    }

}

echo "<pre>";
print($filter);
echo "</pre>";

$filterStr = "";
foreach ($filter as $key => $value){
    $filterStr .= $value;
    if ($key != array_key_last($filter)){
        $filterStr .= ",";
    }
}

print('<br>');
print('<br>');
print('Filtro');
print('<br>');
// print_r($categoryFilter);
print_r($cat);
print('<br>');
print($filterStr);

// header("Location: ../index.php?filtered=true&filter=$filterStr");


// header("Location: ../index.php?filtered=true&filter=$filter2");
// exit;