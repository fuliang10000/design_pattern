<?php


namespace common\strategy;


class CDusesStrategy
{
    public $title = '';
    public $band = '';
    protected $_strategy;

    public function __construct($title, $band)
    {
        $this->title = $title;
        $this->band = $band;
    }

    public function setStrategyContext($strategyObject)
    {
        $this->_strategy = $strategyObject;
    }

    public function get()
    {
        return $this->_strategy->get($this);
    }
}