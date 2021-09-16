<?php


namespace common\strategy;


class CDAsJSONStrategy
{
    public function get(CDusesStrategy $cd)
    {
        $json = [];
        $json['CD']['title'] = $cd->title;
        $json['CD']['band'] = $cd->band;

        return json_encode($json);
    }
}