<?php
/**
 * 观察者模式
 */
namespace app;

use common\observer\BuyCdNotifyStreamObserver;
use common\observer\Cd;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$title = 'Waste of a Rib';
$band = 'Never Again';
$cd = new Cd($title, $band);

$observer = new BuyCdNotifyStreamObserver();
$cd->attachObserver('purchased', $observer);

$cd->buy();
