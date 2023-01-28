<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$obj = new \common\spl\MyCount(10);

echo count($obj) . PHP_EOL;

$array = new SplFixedArray(5);
$array[0] = 11;
$array->setSize(10);
$array[9] = 99;
print_r($array->toArray());
$stack = new SplStack();
$stack->push('张三' . PHP_EOL);//入栈
$stack->push('李四' . PHP_EOL);
$stack->unshift("王五" . PHP_EOL);//将’王五‘放入栈底
echo $stack->pop();//出栈 李四
echo $stack->pop();//张三
echo $stack->pop();//王五
$doubly = new SplDoublyLinkedList();
$doubly->push('a');
$doubly->push('b');
$doubly->push('c');
$doubly->push('d');

echo '初始链表结构：' . PHP_EOL;
print_r($doubly);
