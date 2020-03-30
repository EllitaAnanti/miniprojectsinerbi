<?php

if (! function_exists('value_from_request')) {
    function value_from_request($request, $key) {
        return isset($request[$key]) ? $request[$key] : null;
    }
}

if (! function_exists('char_rand')) {
    function char_rand(){
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()');
        
        shuffle($seed);
        $rand = '';
        foreach (array_rand($seed, 7) as $k) $rand .= $seed[$k];

        return $rand;
    }
}


if (! function_exists('string_has_length')) {
    function string_has_length($string) {
        if(!isset($string) || $string == ""){
            return false;
        }

        return true;
    }
}
