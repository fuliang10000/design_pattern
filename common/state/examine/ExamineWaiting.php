<?php
namespace common\state\examine;

use Runner\Heshen\Contracts\StatefulInterface;

/**
 * 待审核
 * Class ExamineWaiting
 * @package common\state\examine
 */
class ExamineWaiting implements StatefulInterface
{
    protected $state = "0";

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }
}