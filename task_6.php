<?php
function changeString ($string) : string {
    $string = str_replace(array("-", "_"), " ", trim($string));
    $string = ucwords($string);
    return str_replace(" ","",$string);
}

echo changeString("               The quick-brown_fox jumps over the_lazy-dog       ");
