<?php

namespace php8;
require_once dirname(__DIR__) . '/vendor/autoload.php';
function show(mixed $name)
{
    var_dump($name);
}

show(true);
