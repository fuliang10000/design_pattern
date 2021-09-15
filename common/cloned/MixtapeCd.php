<?php


namespace common\cloned;


class MixtapeCd extends Cd
{
    public function __clone()
    {
        $this->title = 'Mixtape';
    }
}