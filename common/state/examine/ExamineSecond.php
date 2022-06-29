<?php
namespace common\state\examine;

use Runner\Heshen\Contracts\StatefulInterface;

/**
 * 审核第二步
 * Class ExamineSecond
 * @package common\state\examine
 */
class ExamineSecond implements StatefulInterface
{
    protected $state = "2";

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }
}