<?php

namespace php8;

use common\php8\Foo;

require_once dirname(__DIR__) . '/vendor/autoload.php';

function squares($start, $stop) {
    if ($start < $stop) {
        for ($i = $start; $i <= $stop; $i++) {
            yield $i => $i * $i;
        }
    }
    else {
        for ($i = $start; $i >= $stop; $i--) {
            yield $i => $i * $i; //迭代生成数组： 键=》值
        }
    }
}
foreach (squares(3, 15) as $n => $square) {
    echo $n . 'squared is' . $square . PHP_EOL;
}
