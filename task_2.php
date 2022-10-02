<?php
function birthdayCountdown ($date) : int {

    $clearDate = preg_replace('/[^0-9\-]/u', '', trim($date));
    $dateArray = explode('-', $clearDate);

    if (!CheckValidation($dateArray))
        return false;

    $today = date("d-m-Y");
    $todayArray = explode('-', $today);

    $todayDays = mktime(0, 0, 0, $todayArray[1], $todayArray[0], 0);
    $dateDays = mktime(0, 0, 0, $dateArray[1], $dateArray[0], 0);

    $yearDays = date('L') ? 366:  365;

    $days = intval(($dateDays - $todayDays) / 86400);

    return  $days < 0 ? $days + $yearDays : $days;
}

function CheckValidation ($dateArray) : bool {
    if (count($dateArray) !== 3) {
        return false;
    }

    for ($i = 0; $i < count($dateArray); $i++) {
        if (!is_numeric($dateArray[$i]) || $dateArray[$i] == 0) {
            return false;
        }
    }
    return true;
}

$days = birthdayCountdown("10-02-2002");
if (!$days) {
    echo "Date is invalid";
} else {
    echo "Days left: " . $days;
}





