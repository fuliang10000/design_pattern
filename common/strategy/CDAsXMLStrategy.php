<?php


namespace common\strategy;


class CDAsXMLStrategy
{
    public function get(CDusesStrategy $cd)
    {
        $doc = new \DomDocument();

        $root = $doc->createElement('CD');
        $root = $doc->appendChild($root);

        $title = $doc->createElement('TITLE', $cd->title);
        $title = $doc->appendChild($title);

        $band = $doc->createElement('BAND', $cd->band);
        $band = $doc->appendChild($band);

        return $doc->saveXML();
    }
}