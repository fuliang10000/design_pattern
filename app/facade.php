<?php
/**
 * 外观模式
 * @description 通过在必需的逻辑和方法的集合前构建简单的外观接口，
 * 外观模式隐藏了来自调用对象的复杂性。
 */
namespace app;

use common\facade\Cd;
use common\facade\WebServiceFacade;

require_once dirname(__DIR__) . '/vendor/autoload.php';
$title = 'title';
$band = 'band';
$tracks = ['What It Means', 'Brr', 'Goodbye'];
$cd = new Cd($title, $band, $tracks);

echo WebServiceFacade::makeXMLCall($cd);