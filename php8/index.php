<?php

namespace php8;
require_once dirname(__DIR__) . '/vendor/autoload.php';
$a = str_contains('FooBar', 'Foo');
$b = str_contains(haystack: 'FooBar', needle: 'Foo');
//var_dump($a);
function show($name, $age)
{
    echo "$name,$age";
}

//show(age: '123', name: 'fuliang');
$rf = new \ReflectionClass(\common\php8\Person::class);
echo "<pre>";
print_r($rf->getConstructor());
echo $rf->getName() . "\r\n";
echo $rf->getShortName() . "\r\n";
echo "<pre>";
$arr = $rf->getProperties();
echo "<pre>";
print_r($arr);
$arr=$rf->getMethods();
print_r($arr);
echo $rf->getNamespaceName() . "\r\n";
echo "</pre>";

new \PhpToken();