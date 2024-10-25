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
    <title>Puntuable 5.1</title>
</head>

<body>
    <main>
        <form action="index.php" method="post">
            <div>
                <h3>Generador Nº Aleatorio</h3>
            </div>
            <div id="buttons">
                <button type="submit">Generar</button>
                <button type="button" onclick="Clear()">Clear</button>
            </div>
        </form>
        <div id="php">
        <?php

        $numeros = [];

        for ($i=0; count($numeros) < 6; $i++) { 
            $numero_aleatorio = rand(1,49);
            if (no_se_repite($numero_aleatorio,$numeros)){
                array_push($numeros,$numero_aleatorio);
            }
        }

        echo "<h3>Numeros:</h3>";
        echo "<table border='solid 1px black' style='text-align:center;border-collapse:collapse;'>";
        echo "<tr>";
        foreach ($numeros as $numero){                       
            echo "<td style='padding:3px;'>";
            echo $numero;
            echo "</td>";
        }
        echo "</tr>";
        echo "</table>";

        echo '<button id="show" type="button" onclick="ShowRawArray()">Mostrar Array Raw</button>';

        echo '<pre id="raw_array">';
        print_r($numeros);
        echo '</pre>';

        function no_se_repite($num,$array){
            for ($i=0; $i < count($array); $i++) { 
                if ($num == $array[$i]) {
                    return false;
                }
            }  
            return true;
        }                         
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