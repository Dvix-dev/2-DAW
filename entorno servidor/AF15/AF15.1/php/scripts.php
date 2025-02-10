<?php
include "functions.php";

// Head y header
print_head();
print_header();

$codplanta = isset($_POST['codplanta']) ? trim(htmlspecialchars($_POST['codplanta'])) : null;
$name = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'])) : null;
$plant_date = isset($_POST['plant_date']) ? $_POST['plant_date'] : null;
$cant = isset($_POST['cant']) ? trim($_POST['cant']) : null;
$button = $_POST['button'];


// Configuracion de la base de datos
$dsn = "mysql:host=localhost;dbname=prueba";
$usuario = "root";
$contraseña = "";

try {
    // Conexión a la base de datos metodo PDO
    $bdd_prueba = new PDO($dsn, $usuario, $contraseña);
    $bdd_prueba->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd_prueba;
    $ok = false;

} catch (PDOException $e) {
    $bdd_prueba = null;
    echo "❌ Error de conexión: " . $e->getMessage();
}

// Guardar la base de datos antes de ejecutar cambios
$query = "SELECT * FROM plantas ORDER BY ID ASC";
$prev_bdd = $bdd_prueba->query($query);

echo "<main>";
echo "<div id='resultados'>";

if ($button == "insert") {
    // Insertar datos en la base de datos
    $query = "SELECT COUNT(*) FROM plantas WHERE codplanta = '$codplanta'"; // Comprobar si el código de planta ya existe
    $repetido = $bdd_prueba->query($query)->fetchColumn() > 0 ? true : false;

    if ($repetido) {
        echo "<span class='error'>⚠️ El código de planta <b>". $codplanta ."</b> ya existe</span>";
    } else {
        $query = "INSERT INTO plantas (codplanta, nombre, f_plantacion, n_ejemplares) VALUES (?, ?, ?, ?)";
        $stmt = $bdd_prueba->prepare($query);
        
        $stmt->bindValue(1, $codplanta, PDO::PARAM_STR);
        $stmt->bindValue(2, $name, $name !== "" ? PDO::PARAM_STR : PDO::PARAM_NULL);
        $stmt->bindValue(3, $plant_date, $plant_date !== "" ? PDO::PARAM_STR : PDO::PARAM_NULL);
        $stmt->bindValue(4, $cant, $cant !== "" ? PDO::PARAM_INT : PDO::PARAM_NULL);
    
        if (!$stmt) {
            echo "<span class='error'>⚠️ Error al preparar la consulta</span>";
        } elseif (!$stmt->execute()) {
            echo "<span class='error'>⚠️ Error al ejecutar la consulta</span>";
        } else {
            echo "<span class='success'>✅ Datos insertados correctamente</span>";
            $ok = true;
        }
    }

} elseif ($button == "update"){
    // Actualizar datos en la base de datos
    $query = "SELECT COUNT(*) FROM plantas WHERE codplanta = '$codplanta'"; // Comprobar si el código de planta está en la base de datos
    $existe = $bdd_prueba->query($query)->fetchColumn() > 0 ? true : false;

    if ($existe) {
        $query = "UPDATE plantas SET nombre = ?, f_plantacion = ?, n_ejemplares = ? WHERE codplanta = ?";        
        $stmt = $bdd_prueba->prepare($query);

        $stmt->bindValue(1, $name !== "" ? $name : null, $name !== "" ? PDO::PARAM_STR : PDO::PARAM_NULL);
        $stmt->bindValue(2, $plant_date !== "" ? $plant_date : null, $plant_date !== "" ? PDO::PARAM_STR : PDO::PARAM_NULL);
        $stmt->bindValue(3, $cant !== "" ? $cant : null, $cant !== "" ? PDO::PARAM_INT : PDO::PARAM_NULL);
        $stmt->bindValue(4, $codplanta, PDO::PARAM_STR);

        if (!$stmt) {
            echo "<span class='error'>⚠️ Error al preparar la consulta</span>";
        } elseif (!$stmt->execute()) {
            echo "<span class='error'>⚠️ Error al ejecutar la consulta</span>";
        } else {
            echo "<span class='success'>✅ Datos actualizados correctamente</span>";
            $ok = true;
        }
    } else {
        echo "<span class='error'>⚠️ El código de planta <b>". $codplanta ."</b> no existe; <br>❌ No hubo cambios en la Base de Datos</span>";
    }

    
} else {
    echo "Se ha producido un error";
}

// Mostrar el resultado
if ($ok) {
    echo "<div class='flex-center'>";
}

make_HTML_table($prev_bdd);


if ($ok){
    echo "<img id='flecha' src=https://png.pngtree.com/png-clipart/20220626/original/pngtree-arrow-shape-red-simple-handwriting-png-image_8186742.png style='height: 100px; transform: rotate(102deg);'>";
    echo "</div>";
    
    $query = "SELECT * FROM plantas ORDER BY ID ASC";
    $updated_bdd = $bdd_prueba->query($query);
    
    make_HTML_table($updated_bdd);
}

echo "<a href='../'>Volver al formulario</a>";

echo "</div>";  // Cierre de resultados
echo "</div>";  // Cierre de main