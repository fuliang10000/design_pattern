<?php


namespace common\proxy;


class Cd
{
    public $title = '';
    public $band = '';
    protected $_handle = null;

    public function __construct($title, $band)
    {
        $this->title = $title;
        $this->band = $band;
    }

    protected function _connect()
    {
        $this->_handle = mysql_connect('localhost', 'user', 'pass');
        mysql_select_db('cd', $this->_handle);
    }

    public function buy()
    {
        $this->_connect();

        $sql = "update cds set bought=1 where band='{$this->band}' and title='{$this->title}'";

        mysql_query($sql, $this->_handle);
    }
}
