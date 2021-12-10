<?php


namespace common\php8;


class Foo implements \Stringable
{

    public function __toString()
    {
        return 'FooString';
    }
}