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
    $dados = [
        1 => './imagenes/1.png',
        2 => './imagenes/2.png',
        3 => './imagenes/3.png',
        4 => './imagenes/4.png',
        5 => './imagenes/5.png',
        6 => './imagenes/6.png'
    ];

    ################ PRINCIPAL ##################
    $tiradas = tirar(12, 4); // genera 12 tiradas distribuidas aleatoriamente entre los jugadores
    $puntuaciones = puntuar($tiradas);
    $podio = premiar($puntuaciones);

    ################ FUNCIONES ##################

    function tirar($n_tiradas, $n_jugadores) {
        // Función para asignar aleatoriamente cada tirada a un jugador, manteniendo el índice de tirada
        // $resultados = array_fill(0, $n_jugadores, array_fill(0, $n_tiradas, null));
        $resultados = [];

        for ($tirada = 0; $tirada < $n_tiradas; $tirada++) {
            $resultado_tirada = rand(1, 6); // Valor del dado
            $jugador = rand(0, $n_jugadores - 1); // Jugador aleatorio
            $resultados[$jugador][$tirada] = $resultado_tirada; // Almacena el resultado en el índice de tirada
        }
        return $resultados;
    }

    function puntuar($tiradas) {
        // Calcula el puntaje de cada jugador sumando sus tiradas
        $punt_jugadores = [];
        foreach ($tiradas as $jugador => $tirada) {
            $punt_jugadores[$jugador] = array_sum(array_filter($tirada)); // Suma solo los valores no nulos
        }
        return $punt_jugadores;
    }

    function premiar($puntuaciones) {
        // Asigna medallas según el ranking de puntos
        $medallas = ["🥇", "🥈", "🥉", "🥴"];
        $resultado = [];
        
        arsort($puntuaciones); // Ordena de mayor a menor

        $i = 0;
        $aux = null;
        $medalla_actual = 0;

        foreach ($puntuaciones as $jugador => $puntos) {
            // Si hay empate, mantiene la misma medalla
            if ($aux === $puntos && $i > 0) {
                $medalla = $medallas[$medalla_actual];
            } else {
                $medalla = $medallas[$i];
                $medalla_actual = $i;
            }
            $resultado[$jugador] = [
                'jugador' => 'Jugador '.($jugador + 1),
                'puntos' => $puntos,
                'medalla' => $medalla
            ];
            $aux = $puntos;
            $i++;
        }
        return $resultado;
    }
?>

<body>
    <div class="contenedor">
        <div class="tapiz">
        <div class="tablero">
            <h1>Repartición de Medallas</h1>
            <button onclick="window.location.reload();">Probar de nuevo</button>
            <table>
                <thead>
                    <tr>
                        <th>Jugador</th>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <th>Tirada <?php echo $i; ?></th>
                        <?php endfor;?>
                        <th>Puntos Totales</th>
                        <th>Medalla</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Colores asignados para cada jugador
                    $colores = ["#DC9845", "#ba9169", "#A2744E", "#DB907D"];
                    // Iconos de jugadores
                    $iconos = ["&#x1F467;", "&#x1F9D1;&#x200D;&#x1F393;", "&#x1F9D1;&#x200D;&#x2695;&#xFE0F;", "&#x1F9D1;&#x200D;&#x1F4BB;"];
                    
                    for ($jugador = 0; $jugador < 4; $jugador++): ?>
                        <tr style="background-color: <?php echo $colores[$jugador]; ?>;">
                            <td><?php echo $iconos[$jugador] . " Jugador " . ($jugador + 1); ?></td>
                            <?php for ($i = 0; $i < 12; $i++): ?>
                                <td>
                                    <?php if (isset($tiradas[$jugador][$i])): ?>
                                        <img src="<?php echo $dados[$tiradas[$jugador][$i]]; ?>" alt="Dado <?php echo $tiradas[$jugador][$i]; ?>" width="30">
                                    <?php endif; ?>
                                </td>
                            <?php endfor; ?>
                            <td><?php echo $puntuaciones[$jugador]; ?></td>
                            <td><?php echo $podio[$jugador]['medalla']; ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</body>
</html>
