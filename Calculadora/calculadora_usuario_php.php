<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <?php
require 'calculadora.php';

$calc = new Calculadora();

try
{
    echo $calc->factorial(2) . "<br>";

} catch (Exception $e) {

    echo 'Caught exception: ', $e->getMessage(), "<br>";
}

try
{
    echo $calc->coeficienteBinomial(5, 5) . "<br>";

} catch (Exception $e) {

    echo 'Caught exception: ', $e->getMessage(), "<br>";
}

try
{
    echo $calc->convierteBinarioDecimal("010110") . "<br>";

} catch (Exception $e) {

    echo 'Caught exception: ', $e->getMessage(), "<br>";
}

try
{
    echo $calc->sumaNumerosPares([1, 2 ,3, 4, 6]) . "<br>";

} catch (Exception $e) {

    echo 'Caught exception: ', $e->getMessage(), "<br>";
}

try
{
    echo $calc->esCapicua("asdsa") . "<br>";

} catch (Exception $e) {

    echo 'Caught exception: ', $e->getMessage(), "<br>";
}


try
{
    $mat1 = [[2, 3, 4], [1, 0, 3]];
    $mat2 = [[0, 3, 2], [9, 5, 0]];
    print_r($calc->sumaMatrices($mat1, $mat2) );
    echo  "<br>";

} catch (Exception $e) {

    echo 'Caught exception: ', $e->getMessage(), "<br>";
}

?>
</body>
</html>