<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="David Escutia de Haro">
    <meta name="author" content="Dvix">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    $tiradas = tirar(12,4);
    $puntuaciones = puntuar($tiradas);
    $podio = premiar($puntuaciones);


    ################ FUNCIONES ##################

    function tirar($n_tiradas, $n_jugadores) {
        // Funcion para simular las tiradas de dados
        $resultados = [];
    
        for ($tirada = 0; $tirada < $n_tiradas; $tirada++) {
            $resultado_tirada = rand(1, 6);
            $jugador = rand(0, $n_jugadores - 1);
            
            $resultados[$tirada] = [
                "Jugador" => $jugador,
                "Resultado" => $resultado_tirada
            ];
        }
        
        return $resultados;
    }
    
    function puntuar($tiradas) {
    // Función que establece las puntuaciones
        $punt_jugadores = [
            0 => 0,
            1 => 0,
            2 => 0,
            3 => 0
        ];
    
        for ($tirada = 0; $tirada < count($tiradas); $tirada++) {
            $jugador = $tiradas[$tirada]["Jugador"];
            $resultado = $tiradas[$tirada]["Resultado"];
            $punt_jugadores[$jugador] += $resultado;
        }
    
        return $punt_jugadores;
    }

    function premiar($puntuaciones) {
    // Funcion que ordena y asigna el premio a los jugadores
        $medallas = ["🥇", "🥈", "🥉", "🥴"];
        $resultado = [];
        
        arsort($puntuaciones);
    
        $i = 0;
        foreach ($puntuaciones as $jugador => $puntos) {
            
            $resultado[] = ['jugador' => 'Jugador '.$jugador + 1, 'puntos' => $puntos, 'medalla' => $medallas[$i]];
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
                    <?php foreach ($tiradas as $jugador => $resultados): ?>
                        <tr>
                            <td>Jugador <?php echo $jugador + 1; ?></td>
                            <?php for ($i = 0; $i < 12; $i++): ?>
                                <td>
                                    <?php if (isset($resultados[$i])): ?>
                                        <img src="<?php echo $dados[$resultados[$i]]; ?>" alt="Dado <?php echo $resultados[$i]; ?>" width="30">
                                    <?php endif; ?>
                                </td>
                            <?php endfor; ?>
                            <td><?php echo $puntuaciones[$jugador]; ?></td>
                            <td><?php echo $podio[$jugador]['medalla']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</body>
</html>