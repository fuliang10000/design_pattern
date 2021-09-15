<?php
/**
 * 观察者模式
 */
namespace app;

use common\observer\BuyCdNotifyStreamObserver;
use common\observer\Cd;
use common\observer\PlayCdNotifyStreamObserver;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$title = 'Waste of a Rib';
$band = 'Never Again';
$cd = new Cd($title, $band);

$buyObserver = new BuyCdNotifyStreamObserver();
$cd->attachObserver('purchased', $buyObserver);

$cd->buy();
$playObserver = new PlayCdNotifyStreamObserver();
$cd->attachObserver('play', $playObserver);

$cd->play();
