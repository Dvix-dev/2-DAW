<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="David Escutia de Haro">
    <meta name="author" content="Dvix">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="favicon" href="assets/">
    <link rel="stylesheet" href="main.css">
    <title>Puntuable 6.1</title>
</head>

<body>
    <main>
        <form action="index.php" method="post">
            <div>
                <h3>Posiciones Dados</h3>
            </div>
            <div id="buttons">
                <button type="submit">Lanzar dados</button>
                <button type="button" onclick="Clear()">Limpiar mesa</button>
            </div>
        </form>
        <div id="php">
            <?php
            $n_jugadores = 4;



                $tiradas = tirar(12, $n_jugadores);
                $resultado_jugadores = asignar_indices($tiradas,$n_jugadores);

                ################ FUNCIONES ##################

                function tirar($n_tiradas, $n_jugadores) {
                    // Función para simular las tiradas de dados
                    $tiradas_realizadas = [];
                    
                    for ($i = 0; $i < $n_tiradas; $i++) {
                        $resultado_tirada = rand(1, 6);
                        $jugador = rand(1, $n_jugadores);
                        $tiradas_realizadas[] = [$resultado_tirada, $jugador];
                    }
                    
                    return $tiradas_realizadas;
                }

                function asignar_indices($tiradas,$n_jugadores) {
                    // Funcion que saca el indice de cada tirada
                    for ($j=0; $j < $n_jugadores; $j++) { 
                        $jugadores[$j] = [];
                    }
                    
                    foreach ($tiradas as $indice => $tirada) {
                        $jugador = $tirada[1];
                        $jugadores[$jugador - 1][] = $indice + 1;
                    }
                    
                    return $jugadores;
                }  
                
                ################ IMPRIMIR EN EL HTML ##################
                echo "<h3>ARRAY</h3>";
                echo "<pre>";
                print_r($resultado_jugadores);
                echo "</pre>";
                echo "<h3>TABLA</h3>";
                echo "<table border='3'>";
                foreach ($resultado_jugadores as $jugador => $posiciones) {
                    echo "<tr><td>Jugador " . ($jugador + 1) . "</td>";
                    foreach ($posiciones as $posicion) {
                        echo "<td>$posicion</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";

                echo "<div class='debug'>";

                echo "<hr>";

                echo "<h1>DEBUG ZONE ⚠️</h1>";

                echo "<pre>";
                print_r($tiradas);
                echo "</pre>";

                echo "</div>";
            ?>
        </div>
    </main>
</body>
