<?php


namespace common\php8;


class Person extends Top
{
    public static $sex = 'nan';
    public $name;
    public $age;
    const HOST = 'www.yzmedu.com';

    public function __construct($n, $a)
    {
        $this->name = $n;
        $this->age = $a;
    }

    public function say()
    {
        echo "my name is {$this->name},my age is {$this->age}";
    }

    public static function show()
    {
        echo "my name is php8";
    }

    use My;
}