<?php


namespace common\php8;


class PersonTwo
{
    public static function say(): static
    {
        return new static();
    }

    public static function show(): static
    {
        return new static();
    }

    public static function look()
    {
        echo 'Person::say()::show()::look() echo';
    }
}