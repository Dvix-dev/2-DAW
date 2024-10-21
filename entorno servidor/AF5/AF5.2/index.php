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
    <title>Puntuable 5.2</title>
</head>

<body>
    <main>
        <form action="index.php" method="post">
            <div>
                <h3>Iniciar Sesión</h3>
            </div>
            <div id="buttons">
                <button type="submit">Generar</button>
                <button type="button" onclick="Clear()">Clear</button>
            </div>
        </form>
        <div id="php">
        <?php

        $fiboarray = fibo(20);

        echo "<table border='solid 1px black' style='text-align:center;border-collapse:collapse;'>";
        echo "<tr>";
        foreach ($fiboarray as $valor){                       
            echo "<td style='padding:3px;'>";
            echo $valor;
            echo "</td>";
        }
        echo "</tr>";
        echo "</table>";

        echo '<button id="show" type="button" onclick="ShowRawArray()">Mostrar Array Raw</button>';

        echo '<pre id="raw_array">';
        print_r($fiboarray);
        echo '</pre>';
        
            function fibo($lenght){
                $fibo = [];
                $num1 = 1;
                $num2 = 1;
                $temp = 0;

                array_push($fibo,$num1);
                for ($i=0; $i < $lenght-1; $i++) { 
                    $temp = $num1;
                    $num1 = $num2;
                    $num2 = $num1 + $temp;
                    array_push($fibo,$num1);
                }
                return $fibo;
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