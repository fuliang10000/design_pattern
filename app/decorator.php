<?php
/**
 * 装饰器模式
 * @description 如果已有对象的部分内容或功能性发生改变，
 * 但是不需要修改原始对象的结构，使用装饰器模式最合适。
 */
namespace app;
use common\decorator\Cd;
use common\decorator\CdTrackListDecoratorCaps;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$myCD = new Cd();
$tracksFromSource = ['What It Means', 'Brr', 'Goodbye'];
foreach ($tracksFromSource as $track) {
    $myCD->addTrack($track);
}
echo $myCD->getTrackList() . "\r\n";
$myCDCaps = new CdTrackListDecoratorCaps($myCD);
$myCDCaps->makeCaps();
echo $myCD->getTrackList() . "\r\n";