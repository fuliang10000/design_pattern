<?php

namespace php8;
require_once dirname(__DIR__) . '/vendor/autoload.php';

#[myattr("api", "http://www.yzmedu.com/api")]
#[api("http://www.yzmedu.com/api")]
/*** @api http://www.yzmedu.com/api */
function show($name)
{
    return $name;
}

echo show('sdfdf');
