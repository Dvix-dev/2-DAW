<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="David Escutia de Haro">
    <link rel="stylesheet" href="main.css">
    <title>Mínimo Común Múltiplo</title>
</head>

<?php
    ################ VARIABLES Y FUNCIONES ##################
    function factorizar($num){
    // Funcion que factoriza los numeros y devuelve un array con todos los factores
        $n_factorizado = [];
        $var = $num;
        $divisor = 2;

        while ($var > 1){
            if ($var % $divisor === 0){
                $n_factorizado[$var] = $divisor;
                $var /= $divisor;
            } else {
                $divisor += 1;
            }
        }
        $n_factorizado[1] = "";

        return $n_factorizado;
    }

    function agrupar($n1,$n2,$n3){
    // Funcion que agrupa todos los numeros factorizados para posteriormente poder trabajar con ellos
        $temp = null;
        $mcms = [];

        $temp = factorizar($n1);
        array_push($mcms,$temp);
        $temp = factorizar($n2);
        array_push($mcms,$temp);
        $temp = factorizar($n3);
        array_push($mcms,$temp);
        
        return $mcms;
    }



    function mcm($n1,$n2,$n3){
    // Funcion que hace el mínimo común múltiplo de los numeros introducidos
        $array = agrupar($n1,$n2,$n3);
        $exponentes = [];
        $mcm = 1;

        for ($i=0; $i < 3; $i++) {      // Bucle para ver cuantas veces se repite un exponente
            $temp = array_count_values($array[$i]);
            array_push($exponentes,$temp);
        }

        $max_cant_exponentes = count($exponentes[0]);   // Bucle que se va quedando con el exponente que mas veces se ha repetido y descarta los demas
        for ($i=1; $i < 3; $i++) { 
            if ($max_cant_exponentes > count($exponentes[$i])){
                $max_cant_exponentes = count($exponentes[$i]);
            }
        }

        $mayores_exponentes = [];
        // Bucles para guardar los mayores exponentes y el superindice en un mismo array
        foreach ($exponentes as $exponente) {
            foreach ($exponente as $key => $value) {
                if (!isset($mayores_exponentes[$key]) || $value > $mayores_exponentes[$key]) {
                    $mayores_exponentes[$key] = $value;
                }
            }
        }

        arsort($mayores_exponentes);

        // Este bucle es el que calcula el mcm usando los datos recogidos
        foreach ($mayores_exponentes as $numero => $exponente) {
            if ($numero != "") {
                $numero = intval ($numero);
                $mcm *= $numero**$exponente;
            }
        } 

        $mcm = [$mcm, $mayores_exponentes];

        return $mcm;

    }

    function printFactorizado($n_factorizado, $numeroSinFactorizar = null){
    // Funcion para poder imprimir la factorización de los numeros introducidos por el usuario con sus superindices
        $temp = array_count_values($n_factorizado);
        $primero = true;

        if ($numeroSinFactorizar !== null){
            $printable = $numeroSinFactorizar . " = ";
        } else {
            $printable = "";
        }
    
        foreach ($temp as $numero => $exponente) {
            if ($numero === '') continue;
    
            if (!$primero) {
                $printable .= ' * ';
            }
            $primero = false;
    
            if ($exponente == 1) {
                $printable .= $numero;
            } else {
                $printable .= "(" . $numero . '<sup>' . $exponente . '</sup>)';
            }
        }
    
        return $printable;
    }
    
    function printMCM($mcm){
    // Funcion para imprimir el mcm de la manera esperada
        $temp = $mcm;
        $primero = true;
        $printable = "";
    
        foreach ($temp as $numero => $exponente) {
            if ($numero === '') continue;
    
            if (!$primero) {
                $printable .= ' * ';
            }
            $primero = false;

            if ($exponente == 1) {
                $printable .= $numero;
            } else {
                $printable .= "(" . $numero . '<sup>' . $exponente . '</sup>)';
            }


        }
    
        return $printable;
    }

    // Valores de prueba
    // $var1 = 60;
    // $var2 = 72;
    // $var3 = 24;

    // Recoger los valores del formulario
    $var1 = intval($_POST["num1"]) ;
    $var2 = intval($_POST["num2"]);
    $var3 = intval($_POST["num3"]);

    ################ PRINCIPAL ##################
    if (is_integer($var1) && is_integer($var2) && is_integer($var3)){
        // Factoriza cada numero
        $n1Factorizado = factorizar($var1);
        $n2Factorizado = factorizar($var2);
        $n3Factorizado = factorizar($var3);

        // Hace que los factores sean imprimibles tipo "2² * 3²"
        $n1FactorizadoImprimible = printFactorizado($n1Factorizado, $var1);
        $n2FactorizadoImprimible = printFactorizado($n2Factorizado, $var2);
        $n3FactorizadoImprimible = printFactorizado($n3Factorizado, $var3);
        
        // Funcion que simplemente factoriza y agrupa los valores en un array
        $numerosFactorizados = agrupar($var1,$var2,$var3);

        // Funcion que realiza el minimo comun multiplo y devuelve el valor y la impresión en un array 
        $minimoComunMultiplo = mcm($var1,$var2,$var3);
    } else {
        echo "Alguno de los valores no es un numero";
    }

?>

<body>
    <div class="contenedor">
        <h1>Calcular Minimo Comun Multiplo</h1>
        <div class="tapiz">
            <div class="tablero">
                <?php
                    echo '<div id="tablas">';
                        $n_tablas = 3;

                        foreach ($numerosFactorizados as $key => $numeroFactorizado) {             
                            $temp = printFactorizado($numeroFactorizado);
                            $primero = true;

                            echo "<table>";
                                echo "<thead><th colspan='3'>Nº ". $key+1 ." Factorizado</th></thead>";
                                foreach ($numeroFactorizado as $restante => $divisible){
                                    if ($primero){
                                        $numero = $restante;
                                        $primero = false;
                                    }
                                    echo "<tr>";
                                        echo "<td>".$restante."</td><td>|</td><td>".$divisible."</td>";
                                    echo "</tr>";
                                }
                                echo "<tfoot><th colspan='3'>". $numero. " = " . $temp ."</th></tfoot>";
                            echo "</table>";
                        }

                    echo "</div>";

                    $mcmImprimible = printMCM($minimoComunMultiplo[1]);
                    echo "<span id='mcm'>m.c.m() = ".$mcmImprimible." = ". $minimoComunMultiplo[0]."<span>";
                ?>
            </div>
            <a href="index.html"><button >Volver al Formulario</button></a>
        </div>
    </div>
    <div id="debug">
        <h1>DEBUG</h1>
        <div>
            <h2>$n1Factorizado</h2>
            <pre>
                <?php print_r($n1Factorizado)  ?>
            </pre>
        </div>
        <hr>
        <div>
            <h2>Factorizados Imprimibles</h2>
            <pre>
                <?php print_r($n1FactorizadoImprimible)  ?>
            </pre>
            <br>
            <pre>
                <?php print_r($n2FactorizadoImprimible)  ?>
            </pre>
            <br>
            <pre>
                <?php print_r($n3FactorizadoImprimible)  ?>
            </pre>
        </div>
        <hr>
        <div>
            <h2>$numerosFactorizados</h2>
            <pre>
                <?php print_r($numerosFactorizados)  ?>
            </pre>
        </div>
        <hr>
        <div>
            <h2>$minimoComunMultiplo</h2>
            <pre>
                <?php print_r($minimoComunMultiplo)  ?>
            </pre>
        </div>
    </div>
</body>
</html>