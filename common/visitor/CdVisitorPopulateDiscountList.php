<?php


namespace common\visitor;


class CdVisitorPopulateDiscountList extends CdVisitorLogPurchase
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