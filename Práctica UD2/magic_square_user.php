<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cuadrado.css">
    <style>
        table,tr,td{
             border: 1px black solid;
             border-collapse: collapse;
             text-align: center;
            }
        table{
            height: 200px;
            width: 200px;
            }
        .correcto{
            color: green;
        }
    </style>

    <title>Magic square</title>

</head>
<body>
    <div id="container">

        <?php

        require 'magic_square.php';

        $array = [[1, 3,1 ], [3,3,3], [3,9,1]];

        //$array = [[0, 0, 0],[0, 0, 0],[0, 0, 0]];

        //$array = [[0, "n", 0],[0, 0, 0],[0, 0, 0]];

        //$array = [[1, 2],[5, 3, 7],[1, 8]];

        $magicSquare = new Square($array);

        try
        {
            $magicSquare->analyzeMagicSquare();
            $magicSquare->showMagicSquare();

        } catch (Exception $e) {

             echo 'Caught exception: ', $e->getMessage(), "<br>";
        }

        ?>

    </div>
</body>
</html>