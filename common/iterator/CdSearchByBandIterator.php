<?php


namespace common\iterator;


class CdSearchByBandIterator implements \Iterator
{

    private $__cds = [];
    private $__valid = false;

    public function __construct($bandName)
    {
        // mock
        $results = [
            'jay' => [
                ['id' => 1, 'band' => 'band_jay_1', 'title' => 'title_jay_1', 'tracknum' => 'tracknum_jay_1', 'tracktitle' => 'tracktitle_jay_1'],
                ['id' => 2, 'band' => 'band_jay_2', 'title' => 'title_jay_2', 'tracknum' => 'tracknum_jay_2', 'tracktitle' => 'tracktitle_jay_2'],
            ],
            'leehom' => [
                ['id' => 1, 'band' => 'band_leehom_1', 'title' => 'title_leehom_1', 'tracknum' => 'tracknum_leehom_1', 'tracktitle' => 'tracktitle_leehom_1'],
                ['id' => 2, 'band' => 'band_leehom_2', 'title' => 'title_leehom_2', 'tracknum' => 'tracknum_leehom_2', 'tracktitle' => 'tracktitle_leehom_2'],
            ],
        ];

        $cdID = 0;
        $cd = null;
        if (isset($results[$bandName])) {
            foreach ($results[$bandName] as $result) {
                if ($result['id'] !== $cdID) {
                    if (!is_null($cd)) {
                        $this->__cds[] = $cd;
                    }
                    $cdID = $result['id'];
                    $cd = new Cd($result['band'], $result['title']);
                }
                $cd->addTrack($result['tracktitle']);
            }
        }
        $this->__cds[] = $cd;
    }

    public function current()
    {
        return current($this->__cds);
    }

    public function next()
    {
        $this->__valid = (next($this->__cds) === false) ? false : true;
    }

    public function key()
    {
        return key($this->__cds);
    }

    public function valid()
    {
        return $this->__valid;
    }

    public function rewind()
    {
        $this->__valid = (reset($this->__cds) === false) ? false : true;
    }
}