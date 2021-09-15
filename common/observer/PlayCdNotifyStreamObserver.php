<?php


namespace common\observer;


class PlayCdNotifyStreamObserver
{
    public function update(Cd $cd)
    {
        $activity = "The CD named {$cd->title} by ";
        $activity .= "{$cd->band} was playing. ";
        ActivityStream::addNewItem($activity);
    }
}