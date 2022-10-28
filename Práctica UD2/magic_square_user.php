<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cuadrado.css">
    <title>Magic square</title>
</head>
<body>
    <div id="container">

        <?php

        require 'magic_square.php';

        $array = [[0, 1, 3], [3, 4, 5], [0,7, 2]];

        $magicSquare = new Square($array);

        print_r($magicSquare->array);
        echo "<br>";

        $magicSquare->analyzeMagicSquare($magicSquare->array);

        echo $magicSquare->firstRow;
        echo "<br>";
        print_r( $magicSquare->rows);
        echo "<br>";
        print_r( $magicSquare->columns);
        echo "<br>";
        echo $magicSquare->firstDiagonal;
        echo "<br>";
        echo $magicSquare->secondDiagonal;
        echo "<br>";

        ?>

    </div>
</body>
</html>