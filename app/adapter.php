<?php
/**
 * 适配器模式
 * @description 在需要转化一个对象的接口用于另一个对象时，
 * 实现Adapter对象不仅是最佳做法，而且也能减少很多麻烦
 */
namespace app;
use common\adapter\ErrorObject;
use common\adapter\LogToConsole;
use common\adapter\LogToCSV;
use common\adapter\LogToCSVAdapter;

require_once dirname(__DIR__) . '/vendor/autoload.php';

//$error = new ErrorObject("404:Not Found");
//$log = new LogToConsole($error);
//$log->write();

$error = new LogToCSVAdapter("500:Not Found");
$log = new LogToCSV($error);
$log->write();