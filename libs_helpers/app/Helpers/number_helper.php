<?php

if (!function_exists('number_is_even')) {   
    function number_is_even($num)
    {
        return ($num % 2 == 0) ? true : false;            
    }
}

if (!function_exists('number_is_odd')) {
    function number_is_odd($num)
    {
        return ($num % 2 == 0) ? false : true;
    }
}
