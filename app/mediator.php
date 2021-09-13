<?php
/**
 * 中介者模式
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
