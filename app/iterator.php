<?php
/**
 * 迭代器模式
 * @description 迭代器模式可帮助构造特定对象，
 * 那些对象能够提供单一标准接口循环或迭代任何类型的可计数数据。
 * 处理可计数和可遍历数据的集合
 */
namespace app;

use common\iterator\CdSearchByBandIterator;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$band = 'jay';
$cds = new CdSearchByBandIterator($band);

foreach ($cds as $cd) {
    print "{$cd->band}---{$cd->title}\r\n";
    print count($cd->trackList) . "\r\n";
}
