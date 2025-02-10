<?php
// Head
echo "<head>";

echo "<link rel='stylesheet' href='../main.css'>";
echo "<link rel='stylesheet' href='scripts.css'>";

echo "</head>";

echo "<div id='background'></div>";

echo "<header>";
echo "<div>";
echo "<img src='https://dvix.es/sources/Dvix%20verde.png' id='logo'>";
echo "<hr>";
echo "<h1>AF 15.1</h1>";
echo "</div>";
echo "</header>";

// Variables Formulario
// $codplanta = trim(htmlspecialchars($_POST['codplanta']));
// $name = trim(htmlspecialchars($_POST['name']));
// $plant_date = $_POST['plant_date'];
// $cant = trim($_POST['cant']);
// $button = $_POST['button'];

$codplanta = isset($_POST['codplanta']) ? trim(htmlspecialchars($_POST['codplanta'])) : null;
$name = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'])) : null;
$plant_date = isset($_POST['plant_date']) ? $_POST['plant_date'] : null;
$cant = isset($_POST['cant']) ? trim($_POST['cant']) : null;
$button = isset($_POST['button']) ? $_POST['button'] : null;


// Conexión a la base de datos
$bdd_prueba = new mysqli("localhost", "root", "", "prueba");

if ($bdd_prueba->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $bdd_prueba->connect_errno . ") " . $bdd_prueba->connect_error;
}

// Guardar la base de datos antes de ejecutar cambios
$query = "SELECT * FROM plantas";
$prev_bdd = $bdd_prueba->query($query);

echo "<div id='resultados'>";

if ($button == "insert") {
    // Insertar datos en la base de datos
    $query = "INSERT INTO plantas (codplanta, nombre, f_plantacion, n_ejemplares) VALUES ('$codplanta', '$name', '$plant_date', '$cant')";
    $resultado = $bdd_prueba->query($query);

    if ($resultado) {
        echo "Datos insertados correctamente ✅";
    } else {
        echo "Error al insertar datos";
    }
} elseif ($button == "update"){
    // Actualizar datos en la base de datos
    $query = "UPDATE plantas SET nombre='$name', f_plantacion='$plant_date', n_ejemplares='$cant' WHERE codplanta='$codplanta'";
    $resultado = $bdd_prueba->query($query);

    if ($resultado) {
        echo "Datos actualizados correctamente ✅";
    } else {
        echo "Error al actualizar datos";
    }
} else {
    echo "Se ha producido un error";
}

// Mostrar el resultado
echo "<table border='1'><tr><th>Código Planta</th><th>Nombre</th><th>Fecha Plantación</th><th>Cantidad</th></tr>";
foreach ($prev_bdd as $row) {
    echo "<tr><td>".$row['codplanta']."</td><td>".$row['nombre']."</td><td>".$row['f_plantacion']."</td><td>".$row['n_ejemplares']."</td></tr>";
}
echo "</table>";

echo "<img id='flecha' src=https://png.pngtree.com/png-clipart/20220626/original/pngtree-arrow-shape-red-simple-handwriting-png-image_8186742.png style='height: 100px; transform: rotate(102deg);'>";

$query = "SELECT * FROM plantas";
$updated_bdd = $bdd_prueba->query($query);

echo "<table border='1'><tr><th>Código Planta</th><th>Nombre</th><th>Fecha Plantación</th><th>Cantidad</th></tr>";
foreach ($updated_bdd as $row) {
    echo "<tr><td>".$row['codplanta']."</td><td>".$row['nombre']."</td><td>".$row['f_plantacion']."</td><td>".$row['n_ejemplares']."</td></tr>";
}
echo "</table>";

echo "<a href='../'>Volver al formulario</a>";

echo "</div>";