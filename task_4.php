<?php
function deleteElement ($array, $position) : array {
    $length = count($array);
    if ($position === $length - 1) {
        unset($array[$length - 1]);
        return $array;
    }

    $i = 0;
    while ($i < $length) {
        if ($i >= $position && $i !== $length - 1) {
            $array[$i] = $array[$i + 1];
        }
        if ($i === $length - 1) {
            unset($array[$i]);
            break;
        }
        $i++;
    }
    return $array;
}

var_dump(deleteElement([1,2,3,4,5], 0));