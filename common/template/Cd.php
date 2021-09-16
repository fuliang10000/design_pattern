<?php


namespace common\template;


class Cd extends SaleItemTemplate
{
    public $title = '';
    public $band = '';

    public function __construct($title, $band, $price)
    {
        $this->title = $title;
        $this->band = $band;
        $this->price = $price;
    }

    protected function taxAddition()
    {
        return round($this->price * .05, 2);
    }
}