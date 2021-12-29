<?php

namespace php8;
require_once dirname(__DIR__) . '/vendor/autoload.php';

$arr1 = [1,2,3,4,56,34,776];
$arr2 = [4,34,1,344,565,23];
print_r(array_values(array_unique(array_merge($arr1, $arr2))));
