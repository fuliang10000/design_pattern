<?php
namespace common\state;

use Runner\Heshen\Blueprint;
use Runner\Heshen\Contracts\StatefulInterface;
use Runner\Heshen\State;

class Graph extends Blueprint
{
    protected function configure(): void
    {

        $this->addState('a', State::TYPE_INITIAL);

        $this->addState('b', State::TYPE_NORMAL);

        $this->addState('c', State::TYPE_NORMAL);

        $this->addState('d', State::TYPE_FINAL);

        $this->addTransition('one', 'a', 'b');

        $this->addTransition('two', 'b', 'c', function (StatefulInterface $stateful, array $parameters) {

            return ($parameters['number'] ?? 0) > 5;

        });
    }

    protected function preOne(StatefulInterface $stateful, array $parameters = [])
    {
        echo "before apply transition 'one'\n";
    }

    protected function postOne(StatefulInterface $stateful, array $parameters = [])
    {
        echo "after apply transition 'one'\n";
    }
}