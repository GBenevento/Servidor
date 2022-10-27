<?php

class Cuadrado

{
    public $firstRow;

    public $sumRows;

    public $sumColumns;

    public $firstDiagonal;

    public $secondDiagonal;

    public function analyzeMagicSquare($array)
    {

    }

    public function showMagicSquare($magicSquare)
    {
       
    }

    function sumRows($array, &$firstRow)
    {
        $addArray = [];
        for ($i=0; $i < count($array); $i++) { 
            $addition = 0;
            for ($j=0; $j < count($array[$i]); $j++) { 
                $addition += $array[$i][$j];
                //array_sum
            }
            $addArray[$i] = $addition;
        }
        return equalsTrue($addArray);
    }

    function sumColumns($array)
    {
        $addArray = [];
        for ($i=0; $i < count($array); $i++) { 
            $addition = 0;
            for ($j=0; $j < count($array[$i]); $j++) { 
                $addition += $array[$j][$i];
            }
            $addArray[$i] = $addition;
        }
    }

    function sumFirstDiagonal($array)
    {
        $columnIndex = count($array) -1;
        for ($i=0; $i < count($array); $i++) { 
            $diagonalSum += $array[$columnIndex-$i][$i];
        }
        return $diagonalSum;
    }

    function sumSeconDiagonal($array)
    {
        for ($i=0; $i < count($array); $i++) { 
            $diagonalSum += $array[$i][$i];
        }
        return $diagonalSum;
    }

    function equalsTrue($array, &$firstRow)
    {
        $isTrueBool = True;
        for ($i=1; $i < count($array); $i++) { 
            if($array[0]!= $array[$i])
            {
                $isTrueBool = False;
            }
        }
        return $isTrueBool;
    }

}
