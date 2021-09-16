<?php


namespace common\proxy;


class ProxyCd extends Cd
{
    protected function _connect()
    {
        $this->_handle = mysql_connect('dallas', 'user', 'pass');
        mysql_select_db('cd', $this->_handle);
    }
}