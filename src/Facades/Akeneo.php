<?php

namespace JustBetter\Akeneo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JustBetter\Akeneo\Integrations\Akeneo
 */
class Akeneo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'akeneo';
    }
}
