<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="David Escutia de Haro">
    <link rel="stylesheet" href="main.css">
    <title>Repartición de Medallas</title>
</head>

<?php
    ################ RUTAS DADOS ##################

    $dados = [
        1 => './imagenes/1.png',
        2 => './imagenes/2.png',
        3 => './imagenes/3.png',
        4 => './imagenes/4.png',
        5 => './imagenes/5.png',
        6 => './imagenes/6.png'
    ];

    ################ PRINCIPAL ##################
    $tiradas = tirar(12, 4);                                        //Hace las tiradas
    $puntuaciones = puntuar($tiradas, 4);       //Da puntuacion a los jugadores segun las tiradas
    $podio = premiar($puntuaciones);                                //Premia las puntuaciones de los jugadores

    ################ FUNCIONES ##################

    function tirar($n_tiradas, $n_jugadores) {
        // Función para asignar aleatoriamente cada tirada a un jugador, manteniendo el índice de tirada
        $resultados = [];

        for ($tirada = 0; $tirada < $n_tiradas; $tirada++) {
            $resultado_tirada = rand(1, 6); // Dado resultado
            $jugador = rand(0, $n_jugadores - 1); // Jugador aleatorio
            $resultados[$jugador][$tirada] = $resultado_tirada; // Almacena el resultado en el índice de tirada
        }
        return $resultados;
    }

    function puntuar($tiradas, $jugadores) {
        // Calcula la puntuación de cada jugador sumando sus tiradas
        $punt_jugadores = [];
      
        for ($i=0; $i < $jugadores; $i++) {     // Inicializar puntuaciones en 0
            $punt_jugadores[$i] = 0;
        }

        foreach ($tiradas as $jugador => $tirada) {
            $punt_jugadores[$jugador] = array_sum($tirada);
        }

        return $punt_jugadores;
    }

    function premiar($puntuaciones) {
        // Asigna medallas según los puntos
        $medallas = ["🥇", "🥈", "🥉", "🥴"];
        $resultado = [];
        
        arsort($puntuaciones);

        // Empates
        $i = 0;
        $aux = null;
        $medalla_actual = 0;

        foreach ($puntuaciones as $jugador => $puntos) {
            if ($aux == $puntos && $i > 0) {
                $medalla = $medallas[$medalla_actual];
            } else {
                $medalla = $medallas[$i];
                $medalla_actual = $i;
                $i++;
            }
            $resultado[$jugador] = [
                'jugador' => 'Jugador '.($jugador + 1),
                'puntos' => $puntos,
                'medalla' => $medalla
            ];
            $aux = $puntos;
        }
        return $resultado;
    }
?>

<body>
    <div class="contenedor">
        <h1>Repartición de Medallas</h1>
        <div class="tapiz">
            <div class="tablero">
                <table>
                    <?php
                        echo "<thead>";
                            echo "<tr>";
                            // echo "<th>Jugador</th>";
                            echo "<th></th>";
                                for ($i = 1; $i <= 12; $i++){
                                    // echo "<th>Tirada  $i</th>";
                                    echo "<th></th>";
                                } 
                                echo "<th>PUNTOS\nTOTALES</th>";
                                // echo "<th>Medalla</th>";
                                echo "<th></th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        // Colores asignados para cada jugador
                        $colores = ["#d69d43", "#bb8f6a", "#a1734f", "#d9907b"];
                        // Iconos de jugadores
                        $iconos = ["👧","🧟","🦸‍♂️","🧌"];
                            
                        for ($jugador = 0; $jugador < 4; $jugador++){
                            echo "<tr style='background-color: $colores[$jugador];'>";
                                echo "<td>";
                                    echo "<span class='emoji_icons'>$iconos[$jugador]</span>";
                                echo "</td>";
                                    for ($i = 0; $i < 12; $i++){
                                        echo "<td>";
                                            if (isset($tiradas[$jugador][$i])){
                                                $puntuacion_aux = $tiradas[$jugador][$i];
                                                echo "<img src='$dados[$puntuacion_aux]' width='50'>";
                                            }
                                        echo "</td>";
                                    }
                                    echo "<td>";
                                        $punts = $puntuaciones[$jugador];
                                        echo "<span class='puntuaciones'>$punts</span>";
                                    echo "</td>";
                                    echo "<td>";
                                        $medalla = $podio[$jugador]['medalla'];
                                        echo "<span class='emoji_icons'>$medalla</span>";
                                    echo "</td>";
                                echo "</tr>";
                        }
                        echo "</tbody>";
                    ?>
                </table>
                <button onclick="window.location.reload();">Probar de nuevo</button>
            </div>
        </div>
    </div>
    <div id="debug">
        <pre>
            <?php print_r($tiradas)?>
        </pre>
        <hr>
        <pre>
            <?php print_r($puntuaciones)?>
        </pre>
        <hr>
        <pre>
            <?php print_r($podio)?>
        </pre>
    </div>
</body>
</html>