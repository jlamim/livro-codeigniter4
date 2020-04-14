<?php

if (!function_exists('a_to_arroba')) {
    function a_to_arroba($text)
    {
        return str_replace("a", "@", $text);
    }
}
