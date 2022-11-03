<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require("magic_square.php");

//Unit tests correctos 3x3

$array = [[0, 1, 3], 
          [2, 0, 2], 
          [0, 1, 2]];

function test_first_row($array)
{
    $square = new Square($array);
    $square->sumFirstRow();
    $x = $square->firstRow;

    return ($x == 4); // True
}

function test_rows($array)
{
    $square = new Square($array);
    $square->sumRows();
    $x = $square->rows;

    return ($x == [4, 4, 3]); // True
}

function test_columns($array)
{
    $square = new Square($array);
    $square->sumColumns();
    $x = $square->columns;

    return ($x == [2, 2, 7]); // True
}

function test_first_diagonal($array)
{
    $square = new Square($array);
    $square->sumFirstDiagonal();
    $x = $square->firstDiagonal;

    return ($x == 3); // True
}

function test_second_diagonal($array)
{
    $square = new Square($array);
    $square->sumSeconDiagonal();
    $x = $square->secondDiagonal;

    return ($x == 2); // True
}

function test_diff_rows($array)
{
    $square = new Square($array);
    $square->diffRows();
    $x = $square->diffRows;

    return ($x == [2] );  // True
}

function test_diff_columns($array)
{
    $square = new Square($array);
    $square->diffColumns();
    $x = $square->diffColumns;

    return ($x == [0, 1, 2] );  // True
}

function test_diff_diagonals($array)
{
    $square = new Square($array);
    $square->diffDiagonals();
    $x = $square->diffDiagonals;

    return ($x == ["first", "second"] );  // True
}

function test_is_magic($array)
{
    $square = new Square($array);
    $square->isMagic();
    $x = $square->isMagic;

    return ($x == false);  // True
}

function test_analyze($array)
{
    $square = new Square($array);
    $square->analyzeMagicSquare();

    $firstRow = $square->firstRow;
    $rows = $square->rows;
    $columns = $square->columns;
    $firstDiagonal = $square->firstDiagonal;
    $secondDiagonal = $square->secondDiagonal;
    $diffRows = $square->diffRows;
    $diffColumns = $square->diffColumns;
    $diffDiagonals = $square->diffDiagonals;
    $isMagic = $square->isMagic;

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
