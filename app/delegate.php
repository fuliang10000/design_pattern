<?php
/**
 * 委托模式
 * @description 通过分配或委托至其他对象，
 * 委托模式能够去除核心对象中的判决和复杂的功能性，并能够动态添加新的功能。
 */
namespace app;

use common\delegate\NewPlayList;
use common\delegate\PlayList;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$externalRetrievedType = $_SERVER['argv'][1] ?? 'pls';
$playList = new PlayList();
$playList->addSong('/Users/fuliang/code/fuliang10000/mq_study/brr.mp3', 'Brr');
$playList->addSong('/Users/fuliang/code/fuliang10000/mq_study/goodbye.mp3', 'Goodbye');

if ($externalRetrievedType == 'pls') {
    $playListContent = $playList->getPLS();
} else {
    $playListContent = $playList->getM3U();
}

echo $playListContent;

$newPlayList = new NewPlayList($externalRetrievedType);
$newPlayList->addSong('/Users/fuliang/code/fuliang10000/mq_study/brr.mp3', 'Brr');
$newPlayList->addSong('/Users/fuliang/code/fuliang10000/mq_study/goodbye.mp3', 'Goodbye');
echo $newPlayList->getPlayList();