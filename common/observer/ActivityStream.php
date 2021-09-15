<?php


namespace common\observer;


class ActivityStream
{
    public static function addNewItem($item)
    {
        print $item . "\r\n";
    }
}