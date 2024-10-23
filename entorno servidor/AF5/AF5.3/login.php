<?php
$usuarios = [
    ["Nombre" => "Ana", "Apellido" => "Martín", "Contraseña" => "Ana1000", "Perfil" => "Perfil1"],
    ["Nombre" => "Ana", "Apellido" => "Gómez", "Contraseña" => "Ana2000", "Perfil" => "Perfil2"],
    ["Nombre" => "Fernando", "Apellido" => "Duque", "Contraseña" => "Motril2222", "Perfil" => "Perfil3"],
    ["Nombre" => "Maria", "Apellido" => "González", "Contraseña" => "Profe333", "Perfil" => "Perfil4"],
    ["Nombre" => "Benito", "Apellido" => "Pérez", "Contraseña" => "Benito1111", "Perfil" => "Perfil5"]
];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$contraseña = $_POST['contraseña'];

$perfil = IniciarSesion($nombre, $apellido, $contraseña, $usuarios);

function IniciarSesion($name, $surname, $password, $database) {
    foreach ($database as $user) {
        if ($user["Nombre"] == $name && $user["Apellido"] == $surname && $user["Contraseña"] == $password) {
            return $user["Perfil"];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <style>
        body {
            display: flex;
            height: 100vh;
            width: 100%;
            margin: 0;
            justify-content: center;
            align-items: center;
        }
        div {
            padding: 10px;
            width: fit-content;
            height: fit-content;
            background-color: rgb(235, 235, 235);
            border-radius: 10px;
            border: 1px solid rgb(176 176 176 / 80%);
        }
    </style>
</head>
<body>
    <div>
        <?php
        if ($perfil) {
            echo "Sesión iniciada como " . $perfil;
        } else {
            echo "Los datos introducidos no son correctos.";
        }
        ?>
    </div>
</body>
</html>