<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="David Escutia de Haro">
    <meta name="author" content="Dvix">
    <link rel="stylesheet" href="main.css">
    <title>Actividad puntuable 3</title>
</head>


<body>
    <?php
    $array1 = [
    // Array de prueba
        'bloque1' => [
            'plano1' => [
                'fila1' => ['item 1' => 1, 'item 2' => 2, 'item 3' => 3],
                'fila2' => ['item 4' => 4, 'item 5' => 5, 'item 6' => 6],
            ],
            'plano2' => [
                'fila1' => ['item 7' => 7, 'item 8' => 8, 'item 9' => 9],
                'fila2' => ['item 10' => 10, 'item 11' => 11, 'item 12' => 12],
            ],
        ],
        'bloque2' => [
            'plano1' => [
                'fila1' => ['item 13' => 13, 'item 14' => 14, 'item 15' => 15],
                'fila2' => ['item 16' => 16, 'item 17' => 17, 'item 18' => 18],
            ],
            'plano2' => [
                'fila1' => ['item 19' => 19, 'item 20' => 20, 'item 21' => 21],
                'fila2' => ['item 22' => 22, 'item 23' => 23, 'item 24' => 24],
            ],
        ],
    ];

    function IndiceArray($array){
        // Indica el indice de cada array, asi como lo
        // hace la ya existente funcion "array_keys()"

        $arrayfinal = [];

        foreach($array as $key => $value){
            $arrayfinal[] = $key;
            
            if (is_array($value)){
                $innerkey = IndiceArray($value);
                $arrayfinal = array_merge($arrayfinal,$innerkey);
            }
        }
        
        return $arrayfinal;
    }
    
    $keys = IndiceArray($array1);
    
    echo '<h1>ACTIVIDAD PUNTUABLE 3</h1>';
    echo '<div class="tarjeta">';
    echo '<h2>ARRAY_KEYS</h2>';
    echo '<div class="contenedor_arrays">';
    foreach ($keys as $key) {
        echo '<span>' . $key . '</span>';
    }
    echo '</div>';
    echo '</div>';
    echo '<br>';
    echo '<br>';
    echo '<div class="tarjeta" id="tarjeta-array_original">';
    echo '<h2>ARRAY_ORIGINAL</h2>';
    echo '<pre class="contenedor_arrays" id="array_original">';
    print_r($array1);
    echo '</pre>';
    echo '</div>';
    ?>
</body>
</html>