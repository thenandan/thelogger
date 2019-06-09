<?php

namespace nandank\thelogger\Facades;

use Illuminate\Support\Facades\Facade;

class theLogger extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'theLogger';
    }
}
