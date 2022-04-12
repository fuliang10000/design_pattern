<?php
/**
 * 工厂模式
 * @description 工厂模式提供获取某个对象的新实例的一个接口，
 * 同时使调用代码避免确定实际实例化基类的步骤。
 * 请求需要某些逻辑和步骤才能确定基对象的类实例时
 */
namespace app;
use common\factory\CdFactory;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$type = $_SERVER['argv'][1] ?? 'normal';
$cdObject = CdFactory::create($type);
$cdObject->setTitle('title');
echo $cdObject->title . "\r\n";
