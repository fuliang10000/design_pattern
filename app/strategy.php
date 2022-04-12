<?php
/**
 * 策略模式
 * @description 帮助构建的对象不必自身包含逻辑，
 * 而是能够根据需要利用其他对象中的算法。
 */
namespace app;

use common\strategy\CDAsJSONStrategy;
use common\strategy\CDAsXMLStrategy;
use common\strategy\CDusesStrategy;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$cd = new CDusesStrategy('title', 'band');

$cd->setStrategyContext(new CDAsXMLStrategy());

print $cd->get();

$cd->setStrategyContext(new CDAsJSONStrategy());

print $cd->get();
