<?php

namespace JustBetter\Akeneo;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JustBetter\Akeneo\Akeneo
 */
class AkeneoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-akeneo';
    }
}
