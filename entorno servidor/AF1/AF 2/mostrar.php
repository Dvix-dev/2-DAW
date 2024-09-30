<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="background-color: <?php echo $_POST["color"] ?>;">
    <?php
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $coche = $_POST["coche"];
        $lugar = $_POST["com_autonomas"];
        $animal = $_POST["animal"];
        $fondo = $_POST["color"];
        $comentario = $_POST["comentario"];
        $oculto = $_POST["hidden"];
        
        
        echo "<span>Usuario:". $user."</span>";
        echo "<span>Contraseña:". $pass."</span>";
        echo "<span>Coche:". $coche."</span>";
        echo "<span>Comunidades autonomas:";
        foreach ($lugar as $valor){
            echo "<li>".$valor."</li>";
        } 
        echo "</span>";
        echo "<span>Animal:". $animal."</span>";
        echo "<span>Color:". $fondo."</span>";
        echo "<span>Comentario:". $comentario."</span>";
        echo "<span>Oculto:". $oculto."</span>";
        ?>
    </div>
</body>