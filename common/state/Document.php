<?php
namespace common\state;

use Runner\Heshen\Contracts\StatefulInterface;

class Document implements StatefulInterface
{
    protected $state = 'a';

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }
}