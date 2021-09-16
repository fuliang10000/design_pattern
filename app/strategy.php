<?php
/**
 * 策略模式
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
