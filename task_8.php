<?php
class Matrix {
    private int $numRows = 0;
    private int $numColumns = 0;
    private array $matrix = [];

    public function __construct($array, $rows, $columns) {
        $this->matrix = $array;
        $this->numRows = $rows;
        $this->numColumns = $columns;
    }

    public function multiplicationMatrix($multiMatrix) :array {
        $rows=count($multiMatrix);
        if (!($this->numColumns == $rows)) {
            return [];
        }
        $columns=count($multiMatrix[0]);
        $newMatrix = [];
        for ($i = 0; $i < $this->numRows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $sum = 0;
                for ($k = 0; $k < $rows; $k++)
                    $sum += $this->matrix[$i][$k]*$multiMatrix[$k][$j];
                $newMatrix[$i][$j] = $sum;
            }
        }
        return $newMatrix;
    }

    public function multiplicationNumber($number) : array {
        $newMatrix = [];
        for ($i = 0; $i < $this->numRows; $i++) {
            for ($j = 0; $j < $this->numColumns; $j++) {
                $newMatrix[$i][$j] = $this->matrix[$i][$j] * $number;
            }
        }
        return $newMatrix;
    }

    public function addMatrix($addedMatrix) : array {
        if ($this->numRows != count($addedMatrix) || $this->numColumns != count($addedMatrix[0])) {
            return [];
        }
        $newMatrix = [];
        for ($i = 0; $i < $this->numRows; $i++) {
            for ($j = 0; $j < $this->numColumns; $j++) {
                $newMatrix[$i][$j] = $this->matrix[$i][$j] + $addedMatrix[$i][$j];
            }
        }
        return $newMatrix;
    }

    public function printMatrix($printedMatrix) : void {
        foreach ($printedMatrix as $row) {
            foreach ($row as $item) {
                echo $item . " ";
            }
            echo "\n";
        }
    }
}

$firstMatrix = [[1,2,3],[5,6,7],[9,10,11]];
$workWithMatrix = new Matrix($firstMatrix,count($firstMatrix),count($firstMatrix[0]));
$secondMatrix = [[1,2,3],[5,6,7],[9,10,11]];
echo "\nMultiplication:\n";
$resMatrix = $workWithMatrix->multiplicationMatrix($secondMatrix);
if ($resMatrix) {
    $workWithMatrix->printMatrix($resMatrix);
} else {
    echo "Wrong matrix size";
}
echo "\nAddition:\n";
$resMatrix = $workWithMatrix->addMatrix($secondMatrix);
if ($resMatrix) {
    $workWithMatrix->printMatrix($resMatrix);
} else {
    echo "Wrong matrix size";
}

echo "\nMultiplication with number:\n";
$workWithMatrix->printMatrix($workWithMatrix->multiplicationNumber(10));