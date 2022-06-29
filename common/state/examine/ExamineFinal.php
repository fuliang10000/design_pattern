<?php
namespace common\state\examine;

use Runner\Heshen\Contracts\StatefulInterface;

/**
 * 审核完成
 * Class ExamineFinal
 * @package common\state\examine
 */
class ExamineFinal implements StatefulInterface
{
    protected $state = "3";

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }
}