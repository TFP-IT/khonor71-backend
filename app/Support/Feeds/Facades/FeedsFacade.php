<?php

namespace App\Support\Feeds\Facades;

use Illuminate\Support\Facades\Facade;

class FeedsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Feeds';
    }
}
