<?php
class Calculadora
{

    public function factorial($x)
    {

        if ($x == 0) {
            return 1;
        } else if ($x > 0) {
            $result = 1;
            while ($x > 0) {
                $result = $result * $x;
                $x = $x - 1;

            }
            return $result;
        } else if ($x < 0) {
            throw new Exception('Negative factorial');
        }

    }

    public function coeficienteBinomial($n, $k)
    {
        if ($n < 1 || $k < 1) {
            throw new Exception('Cannot use negatives');
        }

        return ($this->factorial($n) / $this->factorial($k) * $this->factorial($n - $k));

    }

    public function convierteBinarioDecimal($cadenaBits)
    {

        if (strlen($cadenaBits) > 8) {
            throw new Exception('Only 8 bits are allowed');
        } 
        else 
        {
            $total = 0;

            $inverted = strrev($cadenaBits);

            for ($i = 0; $i < (strlen($inverted)); $i++) 
            {
                if ($inverted[$i] == 1) {
                    $total = $total + (2 ** $i);
                }
            }
            return $total;
        }

    }

    public function sumaNumerosPares($array)
    {
        $result = 0;

        for ($i = 0; $i < (count($array)); $i++) 
        {
            if($array[$i]%2 == 0)
            {
                $result += $array[$i];
            }
        }

        return $result;
    }

    public function esCapicua($string)
    {
       return (strrev($string) == $string);
    }

    public function sumaMatrices($first_mat, $second_mat)
    {

        if (count($first_mat) != count($second_mat)) {
            throw new Exception('The arrays must be the same length');
        } 
        else 
        {
        $sum_mat = [];
       for ($i=0; $i < count($first_mat) ; $i++) 
       { 
        $temp_mat = [];
        for ($j=0; $j < count($first_mat[$i]); $j++) { 
            $sum = $first_mat[$i][$j]+ $second_mat[$i][$j];
            array_push($temp_mat, $sum);
        }
        array_push($sum_mat, $temp_mat);
       }

       return $sum_mat;
    }
    }
}
