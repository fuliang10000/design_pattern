<?php
/**
 * 状态机模式
 * @description 可以根据不同状态或者消息类型进行相应的处理逻辑，使得程序逻辑清晰易懂
 */
namespace app;

use Runner\Heshen\Machine;
use common\state\Document;
use common\state\Graph;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$machine = new Machine(new Document(), new Graph());

var_dump($machine->can('one')); // output: bool(true)
var_dump($machine->can('two')); // output: bool(false)

$machine->apply('one');
/*
 * output:
 * before apply transition 'one'
 * after apply transition 'one'
 */

var_dump($machine->can('two', ['number' => 1])); // output: bool(false)
var_dump($machine->can('two', ['number' => 6])); // output: bool(true)


//通过 Factory 获取 Machine

//use Runner\Heshen\Factory;
//
//$factory = new Factory([
//    Document::class => Graph::class,
//]);
//
//$document = new Document;
//
//$machine = $factory->make($document);
//
//var_dump($machine->can('one')); // output: bool(true)