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
    $x = $square->sercondDiagonal;

    return ($x == 2); // True
}

function test_diff_rows($array)
{
    $square = new Square($array);
    $square->diffRows();
    $x = $square->diffRows;

    return ($x == [] );  // True
}

function test_is_magic($array)
{
    $square = new Square($array);
    $square->isMagic();
    $x = $square->isMagic;

    return ($x == false);  // True
}
