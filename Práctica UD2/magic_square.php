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

    public $diffRows = [];

    public $diffColumns = [];

    public $diffDiagonals = [];

    public $isMagic;

    // Construct method

    public function __construct($array)
    {

        $this->array = $array;

    }

    //Main methods

    public function analyzeMagicSquare()
    {
        $arr = $this->array;

        for ($i = 0; $i < count($arr); $i++) {
            $contColumns = 0;
            for ($j = 0; $j < count($arr[$i]); $j++) {
                $contColumns += 1;
            }
            if ($contColumns !== count($arr)) {
                throw new Exception("The array isn't a square.");
            }

        }

        for ($i = 0; $i < count($arr); $i++) {
            for ($j = 0; $j < count($arr[$i]); $j++) {
                if (!is_numeric($arr[$i][$j])) {
                    throw new Exception($arr[$i][$j] . " is a letter.");
                }
            }
        }

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

        $this->printSquare();
        
        if ($this->isMagic) 
        {
            echo "<p style='color:green'> Magic Square </p>";
        } else 
        {
            echo "<p style='color:red'> Not a magic Square </p>";
            echo "<ul>";

            $sum = "The sum of the first row is " . $this->firstRow;
            $this->printListItem($sum);

            if (!empty($this->diffRows)) {
                $diffR = "The rows that are different from " . $this->firstRow . " are:";
                $this->printListItem($diffR);
                echo "<ul>";
                foreach ($this->diffRows as $key => $value) {
                    $row = "Row " . $value + 1 . " with a value of " . $this->rows[$value];
                    $this->printListItem($row);
                }
                echo "</ul>";
            }

            if (!empty($this->diffColumns)) {
                $diffC ="The columns that are different from " . $this->firstRow . " are:";
                $this->printListItem($diffC);
                echo "<ul>";
                foreach ($this->diffColumns as $key => $value) {
                    $column = "Column " . $value + 1 . " with a value of " . $this->columns[$value];
                    $this->printListItem($column);
                }
                echo "</ul>";
             }

             if (!empty($this->diffDiagonals)) {
                $diffD = "The diagonals that are different from " . $this->firstRow . " are:";
                $this->printListItem($diffD);
                echo "<ul>";
                foreach ($this->diffDiagonals as $key => $value) {
                    echo "<li> The " . $value . " diagonal with a value of ";
                    if ($value == "first") {
                        echo $this->firstDiagonal . "</li>";
                    } else if ($value == "second") {
                        echo $this->secondDiagonal . "</li>";
                    }
                }
                echo "</ul>";
            }
        }

        

    }

    // Other methods

    public function sumFirstRow()
    {
        $this->firstRow = array_sum($this->array[0]);
    }

    public function sumRows()
    {
        $addArray = [];
        for ($i = 0; $i < count($this->array); $i++) {
            $addition = 0;
            for ($j = 0; $j < count($this->array[$i]); $j++) {
                $addition += $this->array[$i][$j];
            }
            $addArray[$i] = $addition;
        }
        $this->rows = $addArray;
    }

    public function sumColumns()
    {
        $addArray = [];
        for ($i = 0; $i < count($this->array); $i++) {
            $addition = 0;
            for ($j = 0; $j < count($this->array[$i]); $j++) {
                $addition += $this->array[$j][$i];
            }
            $addArray[$i] = $addition;
        }
        $this->columns = $addArray;
    }

    public function sumFirstDiagonal()
    {
        $diagonalSum = 0;
        $columnIndex = count($this->array) - 1;
        for ($i = 0; $i < count($this->array); $i++) {
            $diagonalSum += $this->array[$columnIndex - $i][$i];
        }
        $this->firstDiagonal = $diagonalSum;
    }

    public function sumSeconDiagonal()
    {
        $diagonalSum = 0;
        for ($i = 0; $i < count($this->array); $i++) {
            $diagonalSum += $this->array[$i][$i];
        }
        $this->secondDiagonal = $diagonalSum;
    }

    public function diffRows()
    {
        $rows = $this->rows;

        for ($i = 0; $i < count($rows); $i++) {
            if ($rows[$i] != $this->firstRow) {
                array_push($this->diffRows, $i);
            }
        }
    }

    public function diffColumns()
    {
        $columns = $this->columns;

        for ($i = 0; $i < count($columns); $i++) {
            if ($columns[$i] != $this->firstRow) {
                array_push($this->diffColumns, $i);
            }
        }
    }

    public function diffDiagonals()
    {
        if ($this->firstDiagonal != $this->firstRow) {
            array_push($this->diffDiagonals, "first");
        }

        if ($this->secondDiagonal != $this->firstRow) {
            array_push($this->diffDiagonals, "second");
        }
    }

    public function isMagic()
    {
        $this->isMagic = (empty($this->diffRows) && empty($this->diffColumns) && empty($this->diffDiagonals));
    }

    public function printSquare()
    {
        $arr = $this->array;
        echo "<table>";
        for ($i=0; $i < count($arr) ; $i++) { 
            echo "<tr>";
            for ($j=0; $j < count($arr[$i]); $j++) { 
                echo "<td>" . $arr[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    public function printListItem($message)
    {
        echo "<li>" . $message . "</li>";
        echo "<br>";
    }
}
