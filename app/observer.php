<?php
/**
 * 观察者模式
 * @description 能够更便利地创建查看目标对象状态的对象，
 * 并且提供与核心对象非耦合的指定功能性
 * 在创建其核心功能性可能包含可观察状态变化的对象时
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
