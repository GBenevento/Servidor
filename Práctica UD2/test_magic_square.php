<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require("magic_square.php");

//Unit tests correctos 3x3

function test_first_row()
{
    $array = [[0, 1, 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);
    $square->sumFirstRow();
    $x = $square->firstRow;

    return ($x == 4); // True
}

function test_rows()
{
    $array = [[0, 1, 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);
    $square->sumRows();
    $x = $square->rows;

    return ($x == [4, 4, 3]); // True
}

function test_columns()
{
    $array = [[0, 1, 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);
    $square->sumColumns();
    $x = $square->columns;

    return ($x == [2, 2, 7]); // True
}

function test_first_diagonal()
{
    $array = [[0, 1, 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);
    $square->sumFirstDiagonal();
    $x = $square->firstDiagonal;

    return ($x == 3); // True
}

function test_second_diagonal()
{
    $array = [[0, 1, 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);
    $square->sumSeconDiagonal();
    $x = $square->secondDiagonal;

    return ($x == 2); // True
}

function test_diff_rows()
{
    $array = [[0, 1, 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);
    $square->firstRow = 4;

    $square->rows = [4, 4, 3];
    $square->diffRows();
    $x = $square->diffRows;

    return ($x == [2] );  // True
}

function test_diff_columns()
{
    $array = [[0, 1, 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);
    $square->firstRow = 4;

    $square->columns = [2, 2, 7];
    $square->diffColumns();
    $x = $square->diffColumns;

    return ($x == [0, 1, 2] );  // True
}

function test_diff_diagonals()
{
    $array = [[0, 1, 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);
    $square->firstRow = 4;

    $square->firstDiagonal = 3;
    $square->secondDiagonal = 2;
    $square->diffDiagonals();
    $x = $square->diffDiagonals;

    return ($x == ["first", "second"] );  // True
}

function test_is_magic()
{
    $array = [[0, 1, 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);

    $square->diffRows = [2];
    $square->diffColumns = [0, 1, 2];
    $square->diffDiagonals = ["first", "second"];


    $square->isMagic();
    $x = $square->isMagic;

    return ($x == false);  // True
}

function test_analyze()
{
    $array = [[0, 1, 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);

    $square->analyzeMagicSquare();

    $mySquare = new Square($array);

    $mySquare->firstRow = 4;
    $mySquare->rows = [4, 4, 3];
    $mySquare->columns = [2, 2, 7];
    $mySquare->firstDiagonal = 3;
    $mySquare->secondDiagonal = 2;
    $mySquare->diffRows = [2];
    $mySquare->diffColumns = [0, 1, 2];
    $mySquare->diffDiagonals = ["first", "second"];
    $mySquare->isMagic = false;

    return ($square == $mySquare);
    
}
function test_size()
{
    $array = [[0, 1, 3, 4], [2, 0, 2, 9], [0, 1, 2, 0], [0, 2, 1, 3]];
    $square = new Square($array);
    $square->analyzeMagicSquare();

    $mySquare = new Square($array);

    $mySquare->firstRow = 8;
    $mySquare->rows = [8, 13, 3, 6];
    $mySquare->columns = [2, 4, 8, 16];
    $mySquare->firstDiagonal = 7;
    $mySquare->secondDiagonal = 5;
    $mySquare->diffRows = [1, 2 ,3];
    $mySquare->diffColumns = [0, 1, 3];
    $mySquare->diffDiagonals = ["first", "second"];
    $mySquare->isMagic = false;

    return ($square == $mySquare);
}

function test_letter()
{
    $array = [[0, "n", 3], [2, 0, 2], [0, 1, 2]];
    $square = new Square($array);
    return $square->analyzeMagicSquare();
}

function test_square()
{
    $array = [[0, 3], [2, 0, 2]];
    $square = new Square($array);
    return $square->analyzeMagicSquare();
}

function test($executeTest)
{
    try 
    {
        echo "<br><br>";
        $testResult = $executeTest();
        $message = 'The test: '.$executeTest.' ';
        $resultMessage = $testResult ? 'OK' : 'KO';
        echo $message.$resultMessage;

    }
    catch(Exception $e)
    {
        echo "There was a problem with the test:".$executeTest;

    } 
}


echo "Tests that should pass:";

 test("test_first_row");
 test("test_rows");
 test("test_columns");
 test("test_first_diagonal");
 test("test_second_diagonal");
 test("test_diff_rows");
 test("test_diff_columns");
 test("test_diff_diagonals");
 test("test_is_magic");
 test("test_analyze");
 test("test_size");

 echo "<br><br><br>Tests that shouln't pass:";
 test("test_letter");
 test("test_square");

 