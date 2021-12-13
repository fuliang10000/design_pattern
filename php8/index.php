<?php

namespace php8;
require_once dirname(__DIR__) . '/vendor/autoload.php';

$str = "my name is php8";
var_dump(str_contains($str, 'name'));
var_dump(str_starts_with($str, 'my'));
var_dump(str_ends_with($str, 'php8'));