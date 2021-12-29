<?php


namespace common\visitor;


class CdVisitorPopulateDiscountList
{
    public function visitCD($cd)
    {
        if ($cd->price < 10) {
            $this->_populateDiscountList($cd);
        }
    }

    protected function _populateDiscountList($cd)
    {
        dd($cd->log);
    }
}