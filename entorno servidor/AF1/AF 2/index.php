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
    <title>Actividad 1.1</title>
</head>

<body>
    <main>
        <form action="mostrar.php" method="post">
            <div>
                <span>Usuario</span>
                <input type="text" name="user" required>
            </div>
            <div>
                <span>Contraseña</span>
                <input type="password" name="pass" required>
            </div>
            <div class="multiple">
                <span>Coche</span>
                <div class="flexible">
                    <span><label for="xiaomi">Xiaomi</label><input type="radio" name="coche" value="xiaomi" id="xiaomi" required></span>
                    <span><label for="bmw">BMW</label><input type="radio" name="coche" value="bmw" id="bmw"></span>
                    <span><label for="seat">Seat</label><input type="radio" name="coche" value="seat" id="seat"></span>
                </div>
            </div>
            <div class="multiple">
                <span>Comunudad autónoma</span>
                <div class="flexible">
                    <span><label for="andalucia">Andalucia</label><input type="checkbox" name="com_autonomas[]" value="andalucia" required></span>
                    <span><label for="murcia">Murcia</label><input type="checkbox" name="com_autonomas[]" value="murcia"></span>
                    <span><label for="madrid">Madrid</label><input type="checkbox" name="com_autonomas[]" value="madrid"></span>
                </div>
            </div>
            <div>
                <span>Animal</span>
                <select name="animal" id="" required>
                    <option value=""></option>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                    <option value="pajaro">Pájaro</option>
                </select>
            </div>
            <div class="multiple">
                <span>Color de fondo</span>
                <div class="flexible">
                    <span><label for="rojo">rojo</label><input type="radio" name="color" value="red" id="rojo" required></span>
                    <span><label for="azul">azul</label><input type="radio" name="color" value="blue" id="azul"></span>
                    <span><label for="verde">verde</label><input type="radio" name="color" value="green" id="verde"></span>
                </div>
            </div>
            <div>
                <span>Comentario</span>
                <textarea name="comentario" id="comentario"></textarea>
            </div>
            <div>
                <span>Oculto</span>
                <input type="hidden" name="hidden" id="hidden" value="Valor oculto">
            </div>
            <div id="buttons">
                <button type="submit">Enviar</button>
                <button type="reset">Clear</button>
            </div>
        </form>
    </main>
</body>
</html>