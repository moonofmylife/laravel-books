<?php

if (! function_exists('isRequest')) {
    function isRequest($format)
    {
        return request()->is($format);
    }
}

if (! function_exists('conditionClass')) {
    function conditionClass($condition, $class, $tag = false)
    {
        return $condition ? ($tag ? "class=${class}" : $class) : '';
    }
}
