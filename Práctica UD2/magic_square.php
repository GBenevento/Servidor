<?php

class Square
{
    // Propierdades

    public $array;
    
    public $firstRow;

    public $rows;

    public $columns;

    public $firstDiagonal;

    public $secondDiagonal;

    // Método constructor

    function __construct($array)
    {
        $this->array = $array;
    }

    //Métodos principales

    public function analyzeMagicSquare($array)
    {
        $this->firstRow = $this->sumFirstRow($array);
        $this->rows = $this->sumRows($array);
        $this->columns = $this->sumColumns($array);
        $this->firstDiagonal = $this->sumFirstDiagonal($array);
        $this->secondDiagonal = $this->sumSeconDiagonal($array);
    }

    public function showMagicSquare($magicSquare)
    {
       
    }

    // Otros métodos

    function sumFirstRow($array)
    {
        return array_sum($array[0]);
    }

    function sumRows($array)
    {
        $addArray = [];
        for ($i=0; $i < count($array); $i++) { 
            $addition = 0;
            for ($j=0; $j < count($array[$i]); $j++) { 
                $addition += $array[$i][$j];
            }
            $addArray[$i] = $addition;
        }
        return $addArray;
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
        return $addArray;
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


}
