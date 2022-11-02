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
</style>
    <title>Magic square</title>
</head>
<body>
    <div id="container">


    <table>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
            </tr>
            <tr>
                <td>3</td>
                <td>2</td>
                <td>1</td>
            </tr>
            <tr>
                <td>3</td>
                <td>4</td>
                <td>5</td>
            </tr>
        </table>

        <?php

        require 'magic_square.php';

        $array = [[1, 2, 3], [3, 2, 1], [3, 4, 5]];

        //$array = [[0, 0, 0],[0, 0, 0],[0, 0, 0]];

        $magicSquare = new Square($array);

    
        $magicSquare->analyzeMagicSquare();

        $magicSquare->showMagicSquare();

       /* echo $magicSquare->firstRow;
        echo "<br>";
        print_r( $magicSquare->rows);
        echo "<br>";
        print_r( $magicSquare->columns);
        echo "<br>";
        echo $magicSquare->firstDiagonal;
        echo "<br>";
        echo $magicSquare->secondDiagonal;
        echo "<br>";
        print_r($magicSquare->diffRows);
        echo "<br>";
        print_r($magicSquare->diffColumns);
        echo "<br>";
        print_r($magicSquare->diffDiagonals);
        echo "<br>";
        echo $magicSquare->isMagic;
        echo "<br>";*/

        ?>



    </div>
</body>
</html>