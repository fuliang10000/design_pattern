<?php


namespace common\strategy;


class Cd
{
    public $title = '';
    public $band = '';

    public function __construct($title, $band)
    {
        $this->title = $title;
        $this->band = $band;
    }

    public function getAsXML()
    {
        $doc = new \DomDocument();

        $root = $doc->createElement('CD');
        $root = $doc->appendChild($root);

        $title = $doc->createElement('TITLE', $this->title);
        $title = $doc->appendChild($title);

        $band = $doc->createElement('BAND', $this->band);
        $band = $doc->appendChild($band);

        return $doc->saveXML();
    }
}