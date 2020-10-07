<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Datos</title>
    <link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kulim+Park&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/skull-negro.png">
    <script src="js/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php

session_start();

require("datos.php");

?>

<header>
    <img src="images/skull-blanco.png">
    <h1>¡Registraté ya!</h1>
    <img src="images/skull-blanco.png">
</header>

<section>
    <article>
        <h2>Rellene los siguientes campos</h2>

        <form action="" method="POST">

            <?php

            // Queremos que al recargar la página se queden los valores introducidos
            $_SESSION["nombre"] = $_POST["nombre"];
            $_SESSION["apellidos"] = $_POST["apellidos"];
            $_SESSION["direccion"] = $_POST["direccion"];
            $_SESSION["ciudad"] = $_POST["ciudad"];
            $_SESSION["provincia"] = $_POST["provincia"];
            $_SESSION["codpostal"] = $_POST["codpostal"];
            $_SESSION["telefono"] = $_POST["telefono"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["contrasena"] = $_POST["contrasena"];
            $_SESSION["web"] = $_POST["web"];

            ?>

            <div class="entrada"><span>Nombre:</span><input type="text" name="nombre" value="<?php echo $_SESSION["nombre"] ?>"></div>
            <?php
            if (isset($_POST["nombre"])) {
                if ($_POST["nombre"] == ""){
                    echo '<p class="error">Introduce tu nombre</p>';
                }
                if (preg_match($letras, $_POST["nombre"]) == false && $_POST["nombre"] !== ""){
                    echo '<p class="error">Valores numéricos o caracteres extraños no permitidos</p>';
                }
            }
            ?><br>
            <div class="entrada"><span>Apellido(s)</span><input type="text" name="apellidos" value="<?php echo $_SESSION["apellidos"] ?>"></div>
            <?php
            if (isset($_POST["apellidos"])) {
                if ($_POST["apellidos"] == ""){
                    echo '<p class="error">Introduce tu(s) apellido(s)</p>';
                }
                if (preg_match($letras, $_POST["apellidos"]) == false && $_POST["apellidos"] !== ""){
                    echo '<p class="error">Valores numéricos o caracteres extraños no permitidos</p>';
                }
            }
            ?><br>
            <div class="entrada"><span>Dirección:</span><input type="text" name="direccion" value="<?php echo $_SESSION["direccion"] ?>"></div>
            <?php
            if (isset($_POST["direccion"])) {
                if ($_POST["direccion"] == ""){
                    echo '<p class="error">Introduce tu dirección</p>';
                }
            }
            ?><br>
            <div class="entrada"><span>Ciudad:</span><input type="text" name="ciudad" value="<?php echo $_SESSION["ciudad"] ?>"></div>
            <?php
            if (isset($_POST["ciudad"])) {
                if ($_POST["ciudad"] == ""){
                    echo '<p class="error">Introduce tu ciudad</p>';
                }
                if (preg_match($letras, $_POST["ciudad"]) == false && $_POST["ciudad"] !== ""){
                    echo '<p class="error">Valores numéricos o caracteres extraños no permitidos</p>';
                }
            }
            ?><br>
            <div class="entrada"><span>Código Postal:</span><input type="text" name="codpostal" value="<?php echo $_SESSION["codpostal"] ?>"></div>
            <?php
            if (isset($_POST["codpostal"])) {
                if ($_POST["codpostal"] == ""){
                    echo '<p class="error">Introduce tu código postal</p>';
                }
                if (preg_match($postal, $_POST["codpostal"]) == false && $_POST["codpostal"] !== ""){
                    echo '<p class="error">Introduzca un código postal español válido</p>';
                }
                // Necesito los dos primeros números del código postal para luego ver si la provincia corresponde
                else {
                    $primeroscaracteres = substr($_POST["codpostal"], 0, 2);
                    if ($primeroscaracteres == "08") {
                        $annexo = "8";
                    }
                    else if ($primeroscaracteres == "09"){
                        $annexo = "9";
                    }
                    else {
                        $annexo = $primeroscaracteres;
                    }
                }
            }
            ?><br>
            <div class="entrada"><span>Provincia:</span><input type="text" name="provincia" value="<?php echo $_SESSION["provincia"] ?>"></div><?php
            if (isset($_POST["provincia"])) {
                if ($_POST["provincia"] == ""){
                    echo '<p class="error">Introduce tu provincia</p>';
                }
                if (in_array($_POST["provincia"], $provincias[$annexo]) == false && $_POST["provincia"] !== ""){
                    echo '<p class="error">Provincia no coincide con el código postal</p>';
                }
            }
            ?><br>
            <div class="entrada"><span>Teléfono:</span><input type="text" name="telefono" value="<?php echo $_SESSION["telefono"] ?>"></div>
            <?php
            if (isset($_POST["telefono"])) {
                if ($_POST["telefono"] == ""){
                    echo '<p class="error">Introduce tu teléfono</p>';
                }
                if (preg_match($telefono, $_POST["telefono"]) == false && $_POST["telefono"] !== ""){
                    echo '<p class="error">Introduzca un teléfono español válido</p>';
                }
            }
            ?><br>
            <div class="entrada"><span>Email:</span><input type="text" name="email" value="<?php echo $_SESSION["email"] ?>"></div>
            <?php
            if (isset($_POST["email"])) {
                if ($_POST["email"] == ""){
                    echo '<p class="error">Introduce tu email</p>';
                }
                if (preg_match($email, $_POST["email"]) == false && $_POST["email"] !== "") {
                    echo '<p class="error">Introduzca un email válido</p>';
                }
            }
            ?><br>
            <div class="entrada"><span>Contraseña:</span><input type="password" name="contrasena" value="<?php echo $_SESSION["contrasena"] ?>"></div>
            <?php
            if (isset($_POST["contrasena"])) {
                if ($_POST["contrasena"] == ""){
                    echo '<p class="error">Introduce tu contraseña</p>';
                }
                if (preg_match($password, $_POST["contrasena"]) == false && $_POST["contrasena"] !== ""){
                    echo '<p class="error">8-16 caracteres. Mínimo una mayúscula, una minúscula, un número y un caracter especial</p>';
                }
            }
            ?><br>
            <div class="entrada"><span>Web:</span><input type="text" name="web" value="<?php echo $_SESSION["web"] ?>"></div>
            <?php
            if (isset($_POST["web"])) {
                if ($_POST["web"] == ""){
                    echo '<p class="error">Introduce tu web</p>';
                }
                if (preg_match($web, $_POST["web"]) == false && $_POST["web"] !== ""){
                    echo '<p class="error">Dirección web no válida</p>';
                }
            }
            ?><br><br><br><br>
            <div class="entrada"><button type="submit">Enviar Datos</button></div><br>
            <div class="pol">Al enviar tus datos aceptas nuestras Condiciones de uso y venta. Consulta nuestro <a href="aargh.html" target="_blank">Aviso de privacidad</a>, nuestro <a href="aargh.html" target="_blank">Aviso de Cookies</a> y nuestro <a href="aargh.html" target="_blank">Aviso sobre publicidad basada en los intereses del usuario</a>.</div>

        </form>
    </article>
</section>

<footer>
    <form action="https://www.facebook.com/" target="_blank">
        <button class="socialButton" type="submit"><img class="socialMedia" src="images/001-facebook.png"></button>
    </form>
    <form action="https://www.instagram.com/" target="_blank">
        <button class="socialButton" type="submit"><img class="socialMedia" src="images/002-instagram-sketched.png"></button>
    </form>
    <form action="https://www.twitter.com/" target="_blank">
        <button class="socialButton" type="submit"><img class="socialMedia" src="images/003-twitter.png"></button>
    </form>
    <form action="https://www.youtube.com/" target="_blank">
        <button class="socialButton" type="submit"><img class="socialMedia" src="images/004-youtube.png"></button>
    </form>
    <form action="https://www.whatsapp.com/" target="_blank">
        <button class="socialButton" type="submit"><img class="socialMedia" src="images/005-whatsapp.png"></button>
    </form>

    <p id="signature">@@ Hugo Hill Redondo @@</p>

</footer>

</body>
</html