<?php
/**
 * 中介者模式
 * @description 用于开发一个对象，
 * 这个对象能够在类似对象互相之间不直接交互的情况下传送
 * 或调解对这些对象的集合的修改
 * 处理具有类似属性并且属性需要保持同步的非耦合对象时
 */
namespace app;

use common\mediate\Cd;
use common\mediate\MusicContainerMediator;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$mediator = new MusicContainerMediator();

$cd = new Cd($mediator);
$cd->title = 'cd_title';
$cd->band = 'cd_band';
$cd->changeBandName('change_cd_band');
