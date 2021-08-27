<?php


namespace common\factory;


class NormalCd
{
    public $title = '';
    public $band = '';
    public $tracks = [];

    public function __construct()
    {
        
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = 'normal_' . $title;
    }

    /**
     * @param string $band
     */
    public function setBand(string $band)
    {
        $this->band = 'normal_' . $band;
    }

    /**
     * @param string $track
     */
    public function addTrack(string $track)
    {
        $this->tracks[] = 'normal_' . $track;
    }
}