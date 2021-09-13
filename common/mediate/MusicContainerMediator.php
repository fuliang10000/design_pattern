<?php


namespace common\mediate;


class MusicContainerMediator
{
    protected $_containers = [];

    public function __construct()
    {
        $this->_containers[] = 'common\mediate\Cd';
        $this->_containers[] = 'common\mediate\MP3Archive';
    }

    public function change($originalObject, $newValue)
    {
        $title = $originalObject->title;
        $band = $originalObject->band;

        foreach ($this->_containers as $container) {
            if (!($originalObject instanceof $container)) {
                $object = new $container;
                $object->title = $title;
                $object->band = $band;

                foreach ($newValue as $key => $val) {
                    $object->key = $val;
                }

                $object->save();
            }
        }
    }
}
