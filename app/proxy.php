<?php
/**
 * 代理模式
 */
namespace app;

use common\proxy\ProxyCd;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$cd = new ProxyCd('title', 'band');
$cd->buy();
