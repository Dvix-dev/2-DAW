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
                <h3>Gambling Generator</h3>
            </div>
            <div id="buttons">
                <button type="submit">Lanzar dados</button>
                <button type="button" onclick="Clear()">Limpiar mesa</button>
            </div>
        </form>
        <div id="php">
        <?php

            $tiradas = tirar(n_tiradas: 12,n_jugadores: 4);

            $puntuaciones = puntuar($tiradas);

            $podio = premiar($puntuaciones);



            ################ FUNCIONES ##################
            function tirar($n_tiradas,$n_jugadores) {
            // Funcion para simular las tiradas de dados
                $tiradas_realizadas = 0;
                $resultados = [];

                for ($jugador=0; $jugador < $n_jugadores; $jugador++) { 
                    $resultados[$jugador] = [];
                }

                while ($tiradas_realizadas <= $n_tiradas) {  
                    $resultado_tirada = rand(1,6);
                    $jugador = rand(0,$n_jugadores-1);
                    $resultados[$jugador][] = $resultado_tirada;
                    $tiradas_realizadas++;                           
                } 
                return $resultados;
            }

            function puntuar($tiradas) {
            // Función que suma las puntuaciones
                $punt_jugadores = [];
            
                for ($jugador = 0; $jugador < count($tiradas); $jugador++) {
                    $punt_jugadores[$jugador] = array_sum($tiradas[$jugador]);
                }
            
                return $punt_jugadores;
            }

            function premiar($puntuaciones) {
            // Funcion que ordena y asigna el premio a los jugadores
                $medallas = ["Oro", "Plata", "Bronce", "Nada"];
                $resultado = [];
                
                arsort($puntuaciones);
            
                $i = 0;
                foreach ($puntuaciones as $jugador => $puntos) {
                    $resultado[] = ['jugador' => 'Jugador '.$jugador + 1, 'puntos' => $puntos, 'medalla' => $medallas[$i]];
                    $i++;
                }
            
                return $resultado;
            }


           ################ IMPRIMIR EN EL HTML ##################

            echo "<h2>PODIO🏆</h2>";
            echo "<pre id='podio'>";
            print_r($podio);
            echo "</pre>";

            echo "<div class='debug'>";

            echo "<hr>";

            echo "<h1>DEBUG ZONE ⚠️</h1>";

            echo "<pre>";
            print_r($tiradas);
            echo "</pre>";
            
            echo "<hr>";

            echo "<pre class='debug'>";
            print_r($puntuaciones);
            echo "</pre>";

            echo "</div>";
        ?>
    </div>
    </main>

    <script>
        function Clear() {
            document.getElementById('php').style.display = 'none';
            document.getElementById('php').innerHTML = '';
        }

        function ShowRawArray() {
            document.getElementById('raw_array').style.display = 'block';
        }
    </script>
</body>
</html>