<?php
/**
 * 工厂模式
 */
namespace app;
use common\factory\CdFactory;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$type = $_SERVER['argv'][1] ?? 'normal';
$cdObject = CdFactory::create($type);
$cdObject->setTitle('title');
echo $cdObject->title . "\r\n";
