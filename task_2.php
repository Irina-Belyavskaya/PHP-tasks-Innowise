<?php
function birthdayCountdown ($date) : int {

    $clearDate = preg_replace('/[^0-9\-]/u', '', trim($date));
    $dateArray = explode('-', $clearDate);

    if (count($dateArray) !== 3) {
        return -1;
    }

    for ($i = 0; $i < count($dateArray); $i++) {
        if (!is_numeric($dateArray[$i]) || $dateArray[$i] == 0) {
            return -1;
        }
    }

    $today = date("d-m-y");
    $todayArray = explode('-', $today);

    $todayDays = mktime(0, 0, 0, $todayArray[1], $todayArray[0], 0);
    $dateDays = mktime(0, 0, 0, $dateArray[1], $dateArray[0], 0);

    $yearDays = date('L') ? 366:  365;

    $days = intval(($dateDays - $todayDays) / 86400);

    return  $days < 0 ? $days + $yearDays : $days;
}


$days = birthdayCountdown("10-01-2002");
if ($days === -1) {
    echo "Date is invalid";
} else {
    echo "Days left: " . $days;
}





