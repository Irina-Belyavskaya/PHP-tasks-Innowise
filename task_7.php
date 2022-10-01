<?php
function isValidEmail ($email) : bool {
    $regexp = '/^(http|https):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)/i';
    $match = array();
    if (preg_match($regexp, $email, $match ,0, 0)) {
        return true;
    } else {
         return false;
    }
}

if (isValidEmail('https://innowise.ru')) {
    echo 'Email is correct.';
} else {
    echo 'Email is invalid.';
}

