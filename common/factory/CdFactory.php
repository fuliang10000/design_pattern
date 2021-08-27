<?php


namespace common\factory;


class CdFactory
{
    public static function create($type)
    {
        $class = "common\\factory\\" . ucwords(strtolower($type)) . "Cd";

        return new $class;
    }
}