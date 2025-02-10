<?php
include "functions.php";

// Configuracion de la base de datos
$dsn = "mysql:host=localhost;dbname=prueba";
$usuario = "root";
$contraseña = "";

try {
    // Conexión a la base de datos metodo PDO
    $bdd_prueba = new PDO($dsn, $usuario, $contraseña);
    $bdd_prueba->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    $bdd_prueba = null;
    echo "❌ Error de conexión: " . $e->getMessage();
}

// Datos del formulario
$user = $_POST["user"];
$password = $_POST["password"];


// Verificar usuario en la base de datos
$query = "SELECT * FROM usuarios WHERE nombre = '$user'";
$stmt = $bdd_prueba->prepare($query);
$stmt->execute();
$user_data = $stmt->fetch();

print_head();
print_header();

echo "<main>";
echo "<div id='resultados'>";

if ($password === $user_data["clave"]) {
    echo "Bienvenido, <b>" .$user_data["nombre"] ."</b>!<br><br>Tablas en la base de datos <u>prueba</u>:<br>";
    
    $tablas = $bdd_prueba->query("SHOW TABLES");
    foreach ($tablas as $tabla) {
        echo "- ".$tabla[0]."<br>";
    }

} else {
    echo "❌ Usuario o clave incorrectos.<br><a href='../index.html'><button>Volver</button></a>";
}

echo "</div>";
echo "</main>";
