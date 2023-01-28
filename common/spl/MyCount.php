<?php

namespace common\spl;

class MyCount implements \Countable
{

    private int $num;

    public function __construct(int $num)
    {
        $this->num = $num;
    }

    public function count(): int
    {
        return $this->num;
    }
}