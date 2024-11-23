<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="David Escutia de Haro">
    <meta name="author" content="Dvix">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="favicon" href="assets/">
    <link rel="stylesheet" href="main.css">
    <title>Resultado - Mi Substr</title>
    <style>
        span {
            background-color: transparent;
        }

        button {
            margin: auto;
        }
    </style>
</head>

<?php
#### FUNCIONES Y VARIABLES ####

$cadena = $_POST['string'];
$cantidad = $_POST['cant'];
$inicio = isset($_POST['start']) ? intval($_POST['start']) : 0;

function misubstr($cadena,$cantidad,$inicio = 0){
    $resultado = [];

    if ($cantidad > 0){
        $final = $inicio + $cantidad;
        $long_cadena = strlen($cadena);
        $first = true;

        for ($inicio; $inicio < $final; $inicio++){
            if ($first){
                $first = false;
                if ($inicio >= $long_cadena){
                    break;
                } else {
                    array_push($resultado,$cadena[$inicio]);
                }
            } else { 
                if ($inicio >= $long_cadena || $inicio === 0){
                    break;
                } else {
                array_push($resultado,$cadena[$inicio]);
                }
            }
        }
        
        $resultado = implode("",$resultado);
        return $resultado;
    
    }
}

$result = misubstr($cadena,$cantidad,$inicio);
?>

<div class="contenedor">
    <h1>Mi Substr</h1>
    <div>
        <h2>Original</h2>
        <?php print ('<span>'.$cadena.'</span>') ?>
        <hr>
        <h2>Extracto</h2>
        <?php print ('<span>'.$result.'</span>') ?>
    </div> 
    <div style="display:flex; justify-content:center;">
        <a href="index.html"><button id="btn-submit" type="button">Volver</button></a>
    </div>   
</div>