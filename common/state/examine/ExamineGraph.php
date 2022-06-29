<?php
namespace common\state\examine;

use Runner\Heshen\Blueprint;
use Runner\Heshen\Contracts\StatefulInterface;
use Runner\Heshen\State;

class ExamineGraph extends Blueprint
{
    protected function configure(): void
    {

        $this->addState('0', State::TYPE_INITIAL);

        $this->addState('1', State::TYPE_NORMAL);

        $this->addState('2', State::TYPE_NORMAL);

        $this->addState('3', State::TYPE_FINAL);

        $this->addTransition('one', '0', '1');
        $this->addTransition('two', '1', '2');
        $this->addTransition('three', '2', '3', function (StatefulInterface $stateful, array $parameters) {

            return ($parameters['number'] ?? 0) >= 3;

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

    protected function preTwo(StatefulInterface $stateful, array $parameters = [])
    {
        echo "before apply transition 'Two'\n";
    }

    protected function postTwo(StatefulInterface $stateful, array $parameters = [])
    {
        echo "after apply transition 'Two'\n";
    }

    protected function preThree(StatefulInterface $stateful, array $parameters = [])
    {
        echo "before apply transition 'three'\n";
    }

    protected function postThree(StatefulInterface $stateful, array $parameters = [])
    {
        echo "after apply transition 'three'\n";
    }
}