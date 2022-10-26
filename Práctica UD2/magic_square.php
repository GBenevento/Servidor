<?php

class Cuadrado
{
    public function analyzeMagicSquare($array)
    {
        $firstRow = 0;
    }

    public function showMagicSquare($magicSquare)
    {
       
    }

    function countRow($array, &$firstRow)
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

    function countColumn($array)
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

    function countDiagonal($array)
    {
        for ($i=0; $i < count($array); $i++) { 
            for ($j=0; $j < count($array[$i]); $j++) { 
               
            }
        }
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