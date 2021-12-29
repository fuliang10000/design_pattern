<?php


namespace common\visitor;


class Cd
{
    public $band;
    public $title;
    public $price;

    public $log;

    public function __construct($band, $title, $price)
    {
        $this->band = $band;
        $this->title = $title;
        $this->price = $price;
    }

    public function buy()
    {
        $logLine = "{$this->title} by {$this->band} was purchased for {$this->price}";
        $logLine .= " at " . date('Y-m-d H:i:s', time()) . PHP_EOL;

        $this->log = $logLine;
    }

    public function acceptVisitor($visitor)
    {
        $visitor->visitCD($this);
    }
}