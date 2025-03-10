<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="David Escutia de Haro">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="main.css">
    <title>Verbos en Ingles</title>
</head>
<?php 
    include './irregular-verbs-list.php';

    $respondido = false;

    $formas_verbales = [
        "presente",
        "pasado",
        "participio",
    ];

    if (!$respondido){
        $randquestionverbalform = rand(0,count($formas_verbales)-1);
        $questionverbalform = $formas_verbales[$randquestionverbalform];

        $questionverb = rand(0,count($irregularVerbs)-1);
        $arrayverb = $irregularVerbs[$questionverb];
        array_pop($arrayverb);
        $arrayverbconst = $arrayverb;
    }
?>
<body>
    <main>
        <div class="container">
            <h1>Verbos en Ingles</h1>
            <div class="formulario">
                <form action="" method="post">
                    <p class="pregunta">Cual es el <?php print($questionverbalform); ?> de "<?php print($irregularVerbs[$questionverb][3]); ?>"</p>
                    <?php
                        if (!$respondido){
                            shuffle($arrayverb);
                        }
                        foreach ($arrayverb as $key => $value) {
                            print('<div class="respuestarow"><input type="radio" name="respuesta" value="'.$key.'" required><label for="'.$value.'">'.$value.'</label></div>');
                        }
                    ?>
                    <div class="row-btn">
                        <?php
                            if ($respondido){
                                print('<button disabled type="submit">Corregir</button>'); 
                            } else {
                                print('<button type="submit">Corregir</button>');
                            }
                            
                        ?>
                        <button type="reset">Borrar</button>
                    </div>
                </form>
                <?php
                    if ($respondido) {
                        $respuesta = $_POST['respuesta'];
                        $correct_answer = $arrayverb[$randquestionverbalform];
                        print('<div class="solucion">'); 
                        if ($arrayverb[$respuesta] == $correct_answer) {
                            print("¡Respuesta correcta!");
                        } else {
                            print("¡Respuesta incorrecta!<br>");
                            print("El ".$questionverbalform." de ".$irregularVerbs[$questionverb][3]." es ".$arrayverbconst[$randquestionverbalform]."");
                        }
                        print('</div>');
                    }
                ?>
            </div>
            <button class="btn-recargar" onclick="location.reload()">Recargar</button>
        </div>
</body>
</html>