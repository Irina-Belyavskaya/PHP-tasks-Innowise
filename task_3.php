<?php
function addDigits ($number) : array {
    if (!CheckValidation($number))
        return [];
    $numberStr = (string)$number;
    $solvedValues = [];
    do {
        $sum = 0;
        for ($i = 0; $i < strlen($numberStr); $i++) {
            $sum = $sum + (int)$numberStr[$i];
        }
        $solvedValues[] = $sum;
        $numberStr = (string)$sum;
    } while ($sum >= 10);

    return $solvedValues;
}

function CheckValidation ($number) : bool {
    if (!is_numeric($number))
        return false;
    if ($number <= 0)
        return false;
    if (is_float($number))
        return false;
    return true;
}

$resArray = addDigits(1283);
if ($resArray) {
    var_dump($resArray);
} else {
    echo "Invalid number";
}
