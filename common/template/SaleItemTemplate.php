<?php


namespace common\template;


abstract class SaleItemTemplate
{
    public $price = 0;

    public final function setPriceAdjustments()
    {
        $this->price += $this->taxAddition();
        $this->price += $this->overSizedAddition();
    }

    protected function overSizedAddition()
    {
        return 0;
    }

    abstract protected function taxAddition();
}