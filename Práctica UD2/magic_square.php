<?php

class Cuadrado
{
    public function analyzeMagicSquare($array)
    {

    }

    public function showMagicSquare($magicSquare)
    {
       
    }

    function countRow($array)
    {
        $addition = 0;
        $addArray = [];
        for ($i=0; $i < count($array); $i++) { 
            for ($j=0; $j < count($array[$i]); $j++) { 
                $addition += $array[$i][$j];
            }
            
        }
    }

    function countColumn($array)
    {
        for ($i=0; $i < count($array); $i++) { 
            for ($j=0; $j < count($array[$i]); $j++) { 
               
            }
        }
    }

    function countDiagonal($array)
    {
        for ($i=0; $i < count($array); $i++) { 
            for ($j=0; $j < count($array[$i]); $j++) { 
               
            }
        }
    }

}