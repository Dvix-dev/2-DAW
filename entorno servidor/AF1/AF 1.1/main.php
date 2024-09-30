<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <?php
        if (isset($_POST["num1"]) && isset($_POST["num2"])){
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];

            if (is_numeric($num1) && is_numeric($num2)){
                echo "<li>La suma de $num1 y $num2 es igual a " .$num1+$num2. "</li>";
                echo "<li>La resta de $num1 y $num2 es igual a " .$num1-$num2. "</li>";
                echo "<li>El producto de $num1 y $num2 es igual a " .$num1*$num2. "</li>";
                if ($num2 === 0|| $num1 === 0){
                    echo "<li>No se puede dividir por 0</li>";
                } else {"<li>La división de $num1 entre $num2 es igual a " .$num1/$num2. "</li>";}
                echo "<li>El redondeo por exceso de la suma de $num1 y $num2 a la cuarta potencia es " .ceil(pow($num1 + $num2,4)). "</li>";
                echo "<li>La raíz cuadrada del cubo de la suma de $num1 y $num2 es " .sqrt(pow($num1+$num2,3)). "</li>";
                echo "<li>La raíz quinta del cubo de la suma de $num1 y $num2 es " .pow(pow($num1+$num2,3),1/5). "</li>";
            } else {"Alguno de los valores introducidos no es un numero";}
        }
        ?>
    </div>
</body>
