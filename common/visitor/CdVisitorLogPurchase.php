<?php


namespace common\visitor;


class CdVisitorLogPurchase
{
    public function visitCD($cd)
    {
        file_put_contents('/Users/fuliang/code/fuliang10000/design_pattern/logs/purchase.log', $cd->log, FILE_APPEND);
    }
}