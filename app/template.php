<?php
/**
 * 模板模式
 * @description 模板设计模式创建了一个实施一组方法和功能的抽象对象，
 * 子类通常将这个对象作为模板用于自己的设计。
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