<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class Square
{
    // Properties

    public $array;
    
    public $firstRow;

    public $rows;

    public $columns;

    public $firstDiagonal;

    public $secondDiagonal;

    public $diffRows  = [];

    public $diffColumns  = [];

    public $diffDiagonals = [];

    public $isMagic;


    // Construct method

    function __construct($array)
    {
        $this->array = $array;
    }

    //Main methods

    public function analyzeMagicSquare()
    {
        $this->sumFirstRow();
        $this->sumRows();
        $this->sumColumns();
        $this->sumFirstDiagonal();
        $this->sumSeconDiagonal();
        $this->diffRows();
        $this->diffColumns();
        $this->diffDiagonals();
        $this->isMagic();
    }

    public function showMagicSquare()
    {
       if ($this->isMagic)
       {
        echo "Magic Square";
       }
       else
       {
        echo "Not a magic square";
       }

       echo "<br>";
       echo "<br>";
       echo "The sum of the first row is " . $this->firstRow;
       echo "<br>";
       echo "<br>";

       if(!empty($this->diffRows))
       {
        echo "The rows that are different from " . $this->firstRow . " are:";
        echo "<br>";
        echo "<br>";
        foreach($this->diffRows as $key => $value)
        {
          echo "Row ". $value+1 . " with a value of " . $this->rows[$value];
          echo "<br>";
          echo "<br>";
        }
       }

       if(!empty($this->diffColumns))
       {
        echo "The columns that are different from " . $this->firstRow . " are:";
        echo "<br>";
        echo "<br>";
        foreach($this->diffColumns as $key => $value)
        {
          echo "Column ". $value+1 . " with a value of " . $this->columns[$value];
          echo "<br>";
          echo "<br>";
        }
       }

       if(!empty($this->diffDiagonals))
       {
        echo "The diagonals that are different from " . $this->firstRow . " are:";
        echo "<br>";
        echo "<br>";
        foreach($this->diffDiagonals as $key => $value)
        {
          echo "The ". $value . " diagonal with a value of ";
          if($value == "first")
           {
            echo $this->firstDiagonal;
           }
           else if($value == "second")
           {
           echo $this->secondDiagonal;
           }
          echo "<br>";
          echo "<br>";
        }
       }


    }

    // Other methods

    function sumFirstRow()
    {
        $this->firstRow = array_sum($this->array[0]);
    }

    function sumRows()
    {
        $addArray = [];
        for ($i=0; $i < count($this->array); $i++) { 
            $addition = 0;
            for ($j=0; $j < count($this->array[$i]); $j++) { 
                $addition += $this->array[$i][$j];
            }
            $addArray[$i] = $addition;
        }
        $this->rows = $addArray;
    }

    function sumColumns()
    {
        $addArray = [];
        for ($i=0; $i < count($this->array); $i++) { 
            $addition = 0;
            for ($j=0; $j < count($this->array[$i]); $j++) { 
                $addition += $this->array[$j][$i];
            }
            $addArray[$i] = $addition;
        }
        $this->columns = $addArray;
    }

    function sumFirstDiagonal()
    {
        $diagonalSum=0;
        $columnIndex = count($this->array) -1;
        for ($i=0; $i < count($this->array); $i++) { 
            $diagonalSum += $this->array[$columnIndex-$i][$i];
        }
        $this->firstDiagonal = $diagonalSum;
    }

    function sumSeconDiagonal()
    {
        $diagonalSum=0;
        for ($i=0; $i < count($this->array); $i++) { 
            $diagonalSum += $this->array[$i][$i];
        }
        $this->secondDiagonal = $diagonalSum;
    }

    function diffRows()
    {
        $rows = $this->rows;

        for ($i=0; $i < count($rows); $i++) { 
            if($rows[$i] != $this->firstRow)
            {
                $this->diffRows[$i] = $i;
            }
        }
    }

    function diffColumns()
    {
        $columns = $this->columns;

        for ($i=0; $i < count($columns); $i++) { 
            if($columns[$i] != $this->firstRow)
            {
                $this->diffColumns[$i] = $i;
            }
        }
    }

    function diffDiagonals()
    {
        if($this->firstDiagonal != $this->firstRow)
        {
            array_push($this->diffDiagonals, "first");
        }

        if($this->secondDiagonal != $this->firstRow)
        {
            array_push($this->diffDiagonals, "second");
        }
    }

    function isMagic()
    {
        $this->isMagic = (empty($this->diffRows) && empty($this->diffColumns) && empty($this->diffDiagonals));
    }
}
