<?php
namespace common\state\examine;

use Runner\Heshen\Contracts\StatefulInterface;

/**
 * 审核第一步
 * Class ExamineFirst
 * @package common\state\examine
 */
class ExamineFirst implements StatefulInterface
{
    protected $state = "1";

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }
}