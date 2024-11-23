<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="David Escutia de Haro">
    <meta name="author" content="Dvix">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="favicon" href="assets/">
    <link rel="stylesheet" href="main.css">
    <title>Resultado - Mi Str_pad</title>
</head>

<?php
#### FUNCIONES Y VARIABLES ####

$cadena = $_POST['string'];
$cantidad = $_POST['cant'];
$relleno = $_POST['filler'];
$tipo = $_POST['fill-type'];

function mistr_pad($cadena,$cantidad,$relleno,$tipo){
    $resultado = [$cadena];
    $cad_long = strlen($cadena);
    $rell_long = strlen($relleno);
    $aux = 0;

    switch ($tipo) {
        case 'left':
            $pos = 0;
            while ($cad_long < $cantidad) {
                $indice = $aux % $rell_long;
                // array_unshift($resultado,$relleno[$indice]);
                array_splice($resultado,$pos,0,$relleno[$indice]);
                $pos += 1;
                $cad_long++;
                $aux++;
            }
            $resultado = implode("",$resultado);
            return $resultado;

        case 'right':
            while ($cad_long < $cantidad) {
                $indice = $aux % $rell_long;
                array_push($resultado,$relleno[$indice]);
                $cad_long++;
                $aux++;
            }
            $resultado = implode("",$resultado);
            return $resultado;
        
        case 'both':
            $lado = true;
            $pos = 0;
            while ($cad_long < $cantidad) {
                $indice = $aux % $rell_long;
                if ($lado){
                    array_push($resultado,$relleno[$indice]);
                    $lado = false;
                } else {
                    array_splice($resultado,$pos,0,$relleno[$indice]);
                    $lado = true;
                    $pos += 1;
                    $aux++;
                }
                $cad_long++;
            }
            $resultado = implode("",$resultado);
            return $resultado;
    }

}

$result = mistr_pad($cadena,$cantidad,$relleno,$tipo);

?>

<div class="contenedor">
        <h1>Mi Str_pad</h1>
        <div>
            <h2>Resultado</h2>
            <?php print ('<span>'.$result.'</span>') ?>
            <hr>
            <h2>Datos</h2>
            <?php print ('<span>Original: '.$cadena.'</span><br>') ?>
            <?php print ('<span>Longitud: '.$cantidad.'</span><br>') ?>
            <?php print ('<span>Relleno: '.$relleno.'</span><br>') ?>
            <?php print ('<span>Tipo: '.$tipo.'</span>') ?>
        </div> 
        <div style="display:flex; justify-content:center;">
            <a href="index.html"><button id="btn-submit" type="button">Volver</button></a>
        </div>   
    </div>