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
    <title>Actividad 2</title>
</head>

<body>
    <main>
        <form action="index.php" method="post">
            <div>
                <h3>Triangulo de Floyd</h3>
            </div>
            <div>
                <span>Numero</span>
                <input type="text" name="num" required>
            </div>
            <div id="buttons">
                <button type="submit">Enviar</button>
                <button type="reset">Clear</button>
            </div>
        </form>
        <div id="php">
            <?php
                if (isset($_POST["num"])){
                    $num = $_POST["num"];

                    if (is_numeric($num)){
                        if ($num > 0){
                            $x = 1;
                            
                            for ($columna = 1; $x <= $num; $columna++) {
                                for ($fila = 1; $fila <= $columna && $x <= $num; $fila++) {
                                    echo "<span>".$x."</span>";
                                    $x++;
                                }
                                echo "<br>";
                            }

                        } else if ($num == 0){
                            echo "El valor no puede ser 0";
                        } else {echo "El valor no puede ser un número negativo";}
                    } else {echo "El valor introducido no es un numero";}
                }
            ?>
        </div>
    </main>
    <script>
        function Visible() {
            document.getElementById('php').style.display = 'flex';
        }
    </script>
</body>
</html>