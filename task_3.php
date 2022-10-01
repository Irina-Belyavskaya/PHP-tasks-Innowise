<?php
function addDigits ($number) : array {
    if (!is_numeric($number))
        return [];
    $numberStr = (string)$number;

    $solvedValues = [];
    do {
        $sum = 0;
        for ($i = 0; $i < strlen($numberStr); $i++) {
            $sum = $sum + (int)$numberStr[$i];
        }
        echo $sum;
        $solvedValues[] = $sum;
        $numberStr = (string)$sum;
    } while ($sum >= 10);

    return $solvedValues;
}

var_dump(addDigits(1283));