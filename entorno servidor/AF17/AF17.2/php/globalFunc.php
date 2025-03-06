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

function edit_icon(){
    return "<svg id='Pencil_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/><g transform='matrix(1.05 0 0 1.05 12 12)' ><path style='stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill-rule: nonzero; opacity: 1;' transform=' translate(-12.5, -11.5)' d='M 18.414062 2 C 18.158062 2 17.902031 2.0979687 17.707031 2.2929688 L 5 15 C 5 15 6.005 15.005 6.5 15.5 C 6.995 15.995 6.984375 16.984375 6.984375 16.984375 C 6.984375 16.984375 8.003 17.003 8.5 17.5 C 8.997 17.997 9 19 9 19 L 21.707031 6.2929688 C 22.098031 5.9019687 22.098031 5.2689063 21.707031 4.8789062 L 19.121094 2.2929688 C 18.926094 2.0979688 18.670063 2 18.414062 2 z M 18.414062 4.4140625 L 19.585938 5.5859375 L 18.537109 6.6347656 L 17.365234 5.4628906 L 18.414062 4.4140625 z M 15.951172 6.8769531 L 17.123047 8.0488281 L 9.4609375 15.710938 C 9.2099375 15.538938 8.9455469 15.408594 8.6855469 15.308594 C 8.5875469 15.050594 8.4590625 14.789063 8.2890625 14.539062 L 15.951172 6.8769531 z M 3.6699219 17 L 3 21 L 7 20.330078 L 3.6699219 17 z' stroke-linecap='round' /></g></svg>";
}

function delete_icon(){
    return "<svg id='Trash_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/><g transform='matrix(1.54 0 0 1.54 12 12)' ><path style='stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill-rule: nonzero; opacity: 1;' transform=' translate(-7.5, -7.5)' d='M 6.496094 1 C 5.675781 1 5 1.675781 5 2.496094 L 5 3 L 2 3 L 2 4 L 3 4 L 3 12.5 C 3 13.324219 3.675781 14 4.5 14 L 10.5 14 C 11.324219 14 12 13.324219 12 12.5 L 12 4 L 13 4 L 13 3 L 10 3 L 10 2.496094 C 10 1.675781 9.324219 1 8.503906 1 Z M 6.496094 2 L 8.503906 2 C 8.785156 2 9 2.214844 9 2.496094 L 9 3 L 6 3 L 6 2.496094 C 6 2.214844 6.214844 2 6.496094 2 Z M 4 4 L 11 4 L 11 12.5 C 11 12.78125 10.78125 13 10.5 13 L 4.5 13 C 4.21875 13 4 12.78125 4 12.5 Z M 5 5 L 5 12 L 6 12 L 6 5 Z M 7 5 L 7 12 L 8 12 L 8 5 Z M 9 5 L 9 12 L 10 12 L 10 5 Z' stroke-linecap='round' /></g></svg>";
}
