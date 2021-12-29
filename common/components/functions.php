<?php
if (!function_exists('dd')) {
    function dd(...$params)
    {
        foreach ($params as $param) {
            var_export($param);
            echo PHP_EOL;
        }
        exit();
    }
}