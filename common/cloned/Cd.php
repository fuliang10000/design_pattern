<?php


namespace common\cloned;


class Cd
{
    public $title = '';
    public $band = '';
    protected $trackList = [];

    public function __construct($id)
    {

        $data = [
            'a' => ['band' => 'a_band', 'title' => 'a_title'],
            'b' => ['band' => 'b_band', 'title' => 'b_title'],
            'c' => ['band' => 'c_band', 'title' => 'c_title'],
        ];

        if ($row = $data[$id] ?? []) {
            $this->band = $row['band'];
            $this->title = $row['title'];
        }
    }

    public function buy()
    {
        var_dump($this);
    }
}