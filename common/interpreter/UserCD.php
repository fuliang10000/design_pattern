<?php


namespace common\interpreter;


class UserCD
{
    protected $_user = null;

    /**
     * @param null $user
     */
    public function setUser($user)
    {
        $this->_user = $user;
    }

    public function getTitle()
    {
        $title = 'Waste of a Rib';

        return $title;
    }
}