<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carta de Colores</title>
    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "css/style.css">
</head>
<body>
        <h1>Hexadecimal:</h1>
        <form action="" method="POST">
            <p>#<input type="text" name="hexa" value=""></p>
            <p><input type="submit" name="submit" value="COLOR"></p>
        </form>

        <?php
            if (isset($_POST['submit'])){
                $hexa = "#".$_POST['hexa'];
                $hexR = $_POST['hexa'][0].$_POST['hexa'][1];
                $hexG = $_POST['hexa'][2].$_POST['hexa'][3];
                $hexB = $_POST['hexa'][4].$_POST['hexa'][5];
                echo "<p>Color RGB: R=".hexdec($hexR).", B=".hexdec($hexG).", B=".hexdec($hexB)."</p>";
                ?><style>
                    #rectangulo{
                        background-color: <?php echo $hexa;?>;
                    }
                </style><?php
            }
        ?>

        <h1>RGB:</h1>
        <form action="index.php" method="POST">
            <p>R:<input type="number" name="R" min="0" max="255"> G:<input type="number" name="G" min="0" max="255"> B:<input type="number" name="B" min="0" max="255"></p>
            <p><input type="submit" name="submit" value="COLOR"/></p>
        </form>

        <?php
        if (isset($_POST['submit'])){
            $rgb = "rgb(".$_POST['R'].", ".$_POST['G'].", ".$_POST['B'].")";
            $rHEX = dechex($_POST['R']);
            $gHEX = dechex($_POST['G']);
            $bHEX = dechex($_POST['B']);
            echo "<p>Color Hexadecimal: #".$rHEX.$gHEX.$bHEX."</p>";
            ?><style>
                #rectangulo{
                background-color: <?php echo $rgb;?>;
                }
            </style><?php
        }
        ?>

        <div id="rectangulo"></div>

</body>
</html>