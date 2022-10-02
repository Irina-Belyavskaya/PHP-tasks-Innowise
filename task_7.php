<?php
function isValidURl ($url) : bool {
    $regexp = '/^(http|https):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)/i';
    $match = array();
    if (preg_match($regexp, $url, $match ,0, 0)) {
        return true;
    } else {
         return false;
    }
}

if (isValidURl('https://innowise.ru')) {
    echo 'URL is correct.';
} else {
    echo 'URL is invalid.';
}

