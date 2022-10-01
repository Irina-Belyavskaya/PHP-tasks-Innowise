<?php
function testNumber_1 ($inputNumber) : string {
    if ($inputNumber > 30) {
        return "More than 30";
    } else if ($inputNumber > 20) {
        return "More than 20";
    } else if ($inputNumber > 10) {
        return "More than 10";
    } else {
        return "Equal or less than 10";
    }
}

function testNumber_2 ($inputNumber) : string {
    switch (true) {
        case $inputNumber > 30:
            return "More than 30";
        case $inputNumber > 20:
            return "More than 20";
        case $inputNumber > 10:
            return "More than 10";
        default:
            return "Equal or less than 10";
    }
}

function testNumber_3 ($inputNumber) : string {
    $result = $inputNumber > 10 ? "More than 10" : "Equal or less than 10";
    $result = $inputNumber > 20 ? "More than 20" : $result;
    return $inputNumber > 30 ? "More than 30" : $result;
}

$res1 = testNumber_1(31);
$res2 = testNumber_2(31);
$res3 = testNumber_3(31);
echo "Function 1 : " . $res1 . "\n" . "Function 2 : " . $res2 . "\n" . "Function 3 : " . $res3 . "\n";
