<?php
/**
 * 迭代器模式
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
