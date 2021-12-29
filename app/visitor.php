<?php
/**
 * 访问者模式
 * @description 访问者设计模式构造了包含某个算法的截然不同的对象，
 * 在父对象以标准方式使用这些对象时就会将该算法应用于父对象。
 */
namespace app;

use common\visitor\Cd;
use common\visitor\CdVisitorLogPurchase;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$band = 'google';
$title = 'google_title';
$price = '12.20';
$cd = new Cd($band, $title, $price);
$cd->buy();
$cd->acceptVisitor(new CdVisitorLogPurchase());
