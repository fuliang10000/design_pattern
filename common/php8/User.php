<?php


namespace common\php8;


class User
{
    public function __construct(public string $name)
    {
        echo $this->name;
    }
}