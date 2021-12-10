<?php


namespace common\php8;

#[Attribute(Attribute::TARGET_FUNCTION)]
class MyAttr
{
    public function __construct($name, $value)
    {
        echo "$name,$value";
    }
}