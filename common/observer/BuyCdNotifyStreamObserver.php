<?php


namespace common\observer;


class BuyCdNotifyStreamObserver
{
    public function update(Cd $cd)
    {
        $activity = "The CD named {$cd->title} by ";
        $activity .= "{$cd->band} was just purchased. ";
        ActivityStream::addNewItem($activity);
    }
}