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
                <h3>Binario Inverso</h3>
            </div>
            <div id="input-div">
                <input type="text" placeholder="Numero Binario" name="entrada">
                <button id="trash-btn" type="reset">
                    <svg id='Trash_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(0.77 0 0 0.77 12 12)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-13, -12.98)" d="M 11 -0.03125 C 10.164063 -0.03125 9.34375 0.132813 8.75 0.71875 C 8.15625 1.304688 7.96875 2.136719 7.96875 3 L 4 3 C 3.449219 3 3 3.449219 3 4 L 2 4 L 2 6 L 24 6 L 24 4 L 23 4 C 23 3.449219 22.550781 3 22 3 L 18.03125 3 C 18.03125 2.136719 17.84375 1.304688 17.25 0.71875 C 16.65625 0.132813 15.835938 -0.03125 15 -0.03125 Z M 11 2.03125 L 15 2.03125 C 15.546875 2.03125 15.71875 2.160156 15.78125 2.21875 C 15.84375 2.277344 15.96875 2.441406 15.96875 3 L 10.03125 3 C 10.03125 2.441406 10.15625 2.277344 10.21875 2.21875 C 10.28125 2.160156 10.453125 2.03125 11 2.03125 Z M 4 7 L 4 23 C 4 24.652344 5.347656 26 7 26 L 19 26 C 20.652344 26 22 24.652344 22 23 L 22 7 Z M 8 10 L 10 10 L 10 22 L 8 22 Z M 12 10 L 14 10 L 14 22 L 12 22 Z M 16 10 L 18 10 L 18 22 L 16 22 Z" stroke-linecap="round" />
                    </g>
                    </svg>
                </button>
            </div>
            <div id="buttons">
                <button type="submit">Invertir</button>
                <button type="button" onclick="Clear()">Clear</button>
            </div>
        </form>
        <div id="php">
            <?php

            $matriz = [
                [],
                []
            ];
                if (isset($_POST["entrada"])){
                    $num = $_POST["entrada"];

                    if (is_binary($num)){
                        $matriz[0] = str_split($num);

                        for ($i=0; $i < strlen($num); $i++) { 
                            if ($matriz[0][$i] == 0){
                                $matriz[1][$i] = 1;
                            } else {
                                $matriz[1][$i] = 0;
                            }
                        }

                        echo "<table border='solid 1px black' style='text-align:center;border-collapse:collapse;'>";
                        foreach ($matriz as $fila){
                            echo "<tr>";
                            foreach ($fila as $numero) {
                                echo "<td style='padding:3px;'>";
                                echo $numero;
                                echo "</td>";
                            }
                        echo "</tr>";
                        }
                        echo "</table>";

                        echo '<button id="show" type="button" onclick="ShowRawArray()">Mostrar Array Raw</button>';

                        echo '<pre id="raw_array">';
                        print_r($matriz);
                        echo '</pre>';
                    } else {echo "El valor introducido no es un numero binario";}
                } else {echo "El campo no puede quedar vacio";}

                function is_binary($num){
                    if (strlen($num) != 7){
                        return false;
                        }
                        for ($i=0; $i < strlen($num); $i++) { 
                            if ($num[$i] != 1 && $num[$i] != 0){
                                return false;
                            }
                        }
                        return true;
                    }
                                
            ?>
        </div>
    </main>
    <script>
        function Visible() {
            document.getElementById('php').style.display = 'flex';
        }

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