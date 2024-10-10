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
    <title>Actividad No Puntuable</title>
</head>

<body>
    <main>
        <form action="index.php" method="post">
            <div>
                <h3>Matriz 10x10 1-100</h3>
            </div>
            <div id="buttons">
                <button id="submit_btn" type="submit">Generar</button>
                <button type="button" onclick="Clear()">Clear</button>
            </div>
        </form>
        <div id="php">
            <?php
                $matriz_multidimensional = [[],[]];
                $contador1 = 0;
                $contador2 = 0;

                for ($i=1; $i <= 100; $i++){
                    $matriz_multidimensional[$contador1][$contador2] = $i;
                        $contador2++;
                        if ($contador2 == 10){
                            $contador2 = 0;
                            $contador1++;
                        }
                }

                echo "<table border='solid 1px black' style='text-align:center;border-collapse:collapse;'>";
                foreach ($matriz_multidimensional as $fila){
                    echo "<tr>";
                    foreach ($fila as $numero) {
                        echo "<td style='padding:3px;'>";
                        echo $numero;
                        echo "</td>";
                    }
                echo "</tr>";
                }
                echo "</table>"
                    
            ?>
        </div>
    </main>
    <script>
        function Visible() {
            var submit_btn = document.getElementById('submit_btn')
            submit_btn.addEventListener("click", () => {
                document.getElementById('php').style.display = 'block';
            })
        }

        function Clear() {
            document.getElementById('php').innerHTML = '';
            document.getElementById('php').style.display = 'none';
        }
    </script>
</body>
</html>