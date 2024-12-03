<head>
    <link rel="stylesheet" href="main.css">

</head>
<header>
    <div class="logo">
        <img src="https://dvix.es/sources/Dvix verde.png" alt="Logo Empresa">
        <h1>Ficheros - David Escutia de Haro</>
    </div>
    <div class="header_links">
        <a href="./index.html">Home</a>
        <a href="#">Blog</a>
        <div class="busqueda">
            <input class="header_search" type="text" placeholder="Búsqueda">
            <button type="button" class="magnifying_glass_icon"><svg id='search_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/><g transform="matrix(1 0 0 1 12 12)" ><g transform="matrix(1 0 0 1 0 0)" ><path style="stroke: none; stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 0 0 L 24 0 L 24 24 L 0 24 z" stroke-linecap="round" /></g><g transform="matrix(1 0 0 1 -2 -2)" ><circle style="stroke: rgb(33,33,33); stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="7" /></g><g transform="matrix(1 0 0 1 6 6)" ><line style="stroke: rgb(33,33,33); stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="3" y1="3" x2="-3" y2="-3" /></g></g></svg></button>
        </div>
        <a class="header_login-btn" href="#">Login</a>
    </div>
</header>
<main>
    <?php
        if ($_POST['registro']){
            echo ('<div class="formRegister">');
            echo ('<form method="post" action="accion.php">');
            echo ('<h1 class="form_title">Añadir Usuario</h1>');
            echo ('<div class="form_container">');
            echo ('<label>Nombre completo*</label>');
            echo ('<div class="row">');
            echo ('<input type="text" name="name" placeholder="Introduzca su nombre completo" required>');
            echo ('</div>');
            echo ('<label>Fecha de Nacimiento*</label>');
            echo ('<div class="row">');
            echo ('<input type="date" name="birthdate" required>');
            echo ('</div>');
            echo ('<label>Email*</label>');
            echo ('<div class="row">');
            echo ('<input type="email" name="email" placeholder="Introduzca su email" required>');
            echo ('</div>');
            echo ('<label>Telefono*</label>');
            echo ('<div class="row">');
            echo ('<input type="tel" name="phonenum" placeholder="Introduzca su numero telefonico" required>');
            echo ('</div>');
            echo ('</div>');
            echo ('<div class="btn-row">');
            echo ('<button id="btn-submit" type="submit">Registrar usuario</button>');
            echo ('</div>');
            echo ('</form>');
            echo ('</div> ');
        }

        
        $nombre = $_POST['name'];
        $fnacimiento = $_POST['birthdate'];
        $edad = 2024 - explode("-",$fnacimiento)[0];
        $email = $_POST['email'];
        $ntelefono = $_POST['phonenum'];

        $infousuario = [
            "-------------USUARIO-------------","\n",
            "Nombre: ",$nombre,"\n",
            "Fecha de Naciemiento: ",$fnacimiento,"\n",
            "Edad: ",$edad,"\n",
            "Email: ",$email,"\n",
            "Numero de Telefono: ",$ntelefono,"\n","\n"
        ];

        $fp = fopen("usuarios.txt","a");

        foreach ($infousuario as $key => $dato) {
            fwrite($fp,$dato);
        }


        fclose($fp);

        $fp = fopen("usuarios.txt","r");

        echo('<div class="resultado">');
        echo('<span class="doctitle">usuarios.txt</span><br>');
        while (!feof($fp)){
            $line = fgets($fp);
            echo($line."<br>");
        }
        echo('</div>');

        fclose($fp);
    ?>
</main>
<footer>
    <div id="footer">
        <div id="copy">
            &copy; 2024 Dvix-dev
        </div>
        <div id="footer_links">
            <li>Privacidad</li>
            <li>Terminos y Condiciones</li>
            <li>Acuerdo Legal</li>
            <li>About</li>
        </div>
    </div>
</footer>