<?php
// Documento general para unificar algunas funciones
// que se van a usar de manera global recurrentemente.

function bdd_connect(){
    // Funcion para conectar a la base de datos
    $dsn = "mysql:host=localhost;dbname=cocina";
    $bdd_usuario = "root";
    $bdd_contraseña = "";

    try {
        // Conexión a la base de datos metodo PDO
        $bdd_cocina = new PDO($dsn, $bdd_usuario, $bdd_contraseña);
        $bdd_cocina->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd_cocina;

    } catch (PDOException $e) {
        $bdd_cocina = null;
        echo "❌ Error de conexión: " . $e->getMessage();
    }
}

function get_recipes($db) {
    $query = "SELECT * FROM `recetas` ORDER BY `recetas`.`Cod_receta` ASC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $recipes = $stmt->fetchAll();

    return $recipes;
}

function get_categories($db) {
    $query = "SELECT * FROM categorias";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $categories = $stmt->fetchAll();

    return $categories;
}

function categorizar($cod_receta) {
    $bdd_cocina = bdd_connect();
    $query = "SELECT Cod_categoria FROM recetas_categorias WHERE cod_receta = :cod_receta";
    $stmt = $bdd_cocina->prepare($query);
    $stmt->bindParam(':cod_receta', $cod_receta);
    $stmt->execute();
    $categorias_raw = $stmt->fetchAll();

    if (empty($categorias_raw)) {
        return "";
    }

    foreach ($categorias_raw as $categoria) {
        $categorias = "";
        $query = "SELECT nombre FROM categorias WHERE Cod_categoria = $categoria[0]";
        $stmt = $bdd_cocina->prepare($query);
        $stmt->execute();
        $categorias_arr[] = $stmt->fetch();
        $x = 1;
        foreach ($categorias_arr as $categoria) {
            $categorias .= $x != count($categorias_arr) ? $categoria[0]  . ", " : $categoria[0];
            $x++;
        }
    }



    return $categorias;
}