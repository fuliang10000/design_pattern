<?php
/**
 * 模板模式
 * @description
 */
namespace app;

use common\template\BandEndorsedCaseOfCereal;
use common\template\Cd;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$title = 'title';
$band = 'band';
$price = 100;

$cd = new Cd($title, $band, $price);
$cd->setPriceAdjustments();

$cereal = new BandEndorsedCaseOfCereal($band, $price);
$cereal->setPriceAdjustments();

print $cd->price . "\r\n";
print $cereal->price . "\r\n";