<?php
/**
 * 原型模式
 */
namespace app;

use common\cloned\MixtapeCd;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$bandMixProto = new MixtapeCd('a');
$bandMixProto->buy();
$bandMixProtoClone = clone $bandMixProto;
$bandMixProtoClone->buy();
