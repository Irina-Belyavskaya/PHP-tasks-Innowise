<?php
function getNumbersFromInterval ($A, $B) : void{
    if ($A === $B) {
        echo $A. " ";
    } else if ($A < $B) {
        getNumbersFromInterval($A, $B - 1);
        echo $B . " ";
    } else {
        echo $A . " ";
        getNumbersFromInterval($A - 1, $B);
    }
}

getNumbersFromInterval(5,9);