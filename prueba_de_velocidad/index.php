<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Steel</title>

    <link rel = "stylesheet" href = "css/style.css">
    <script src="js/script.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">

</head>
<body>

<?php

$palabras = "";

$db = new mysqli('localhost', 'root', 'Uhhyeah123*', 'proyecto_final');
$db->set_charset('utf8');

// Recogemos las palabras de la BBDD y las metemos en un string. Luego mandamos este string a javascriptve
$resultado = $db-> query('SELECT palabra FROM palabras WHERE dificultad = 0 ORDER BY RAND() LIMIT 200');
$palabra = $resultado->fetch_array(MYSQLI_BOTH);
while ($palabra != null){ //Recorro el resultado
    $palabras = $palabras." ".$palabra[0];
    $palabra = $resultado->fetch_array(MYSQLI_BOTH);
}
$resultado->free(); //Libero de la memoria
echo ""; ?>
<script>
    window.onload = function(){
        inicializarPalabras("<?=$palabras?>");
        let start_button = document.getElementById("start-button");
        start_button.addEventListener("click", comenzar, false);
    }
</script>


<?php
// Para Insertar Palabras a la base de datos -> las meto en $palabras y cargo
/*$palabras = [];
$length = sizeof($palabras);
$dificultad = 0;
for ($i = 0; $i <= $length-1; $i++){
    $db-> query('INSERT INTO palabras (palabra, dificultad) VALUES ("'.$palabras[$i].'", '.$dificultad.')');
}
*/
?>

<div id="header">
    <h1>Prueba de Velocidad</h1>
</div>

<div id="main">
    <button id="start-button">Start</button>
    <br>
    <div id="info">60 segundos restantes</div>

    <div id="row">
        <div id="left">
            <input id="input" readonly>
        </div>
        <div id="palabras">

        </div>
    </div>
</div>

<div id="footer">

</div>

</body>
</html>
