<?php

namespace php8;

use common\php8\PersonTwo;

require_once dirname(__DIR__) . '/vendor/autoload.php';

//$str = 1/0;
//var_dump(fdiv(6, 2));
//$file = 'img/WechatIMG29.png';
//$f = fopen($file, 'rw');
//var_dump($f);
//$fi = (int)$f;
//var_dump($fi);
//var_dump(get_resource_id($f));
PersonTwo::show()::say()::look();

try {
    (fn() => throw new \Exception('error'))();
} catch (\Exception) {
    echo 'Exception error!';
}