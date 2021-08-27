<?php


namespace common\factory;


class EnhancedCd
{
    public $title = '';
    public $band = '';
    public $tracks = [];

    public function __construct()
    {
        $this->tracks[] = 'DATA TRACK';
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = 'enhanced_' . $title;
    }

    /**
     * @param string $band
     */
    public function setBand(string $band)
    {
        $this->band = 'enhanced_' . $band;
    }

    /**
     * @param string $track
     */
    public function addTrack(string $track)
    {
        $this->tracks[] = 'enhanced_' . $track;
    }
}