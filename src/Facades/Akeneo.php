<?php

namespace JustBetter\Akeneo\Facades;

use Illuminate\Support\Facades\Facade;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeAttributeApi;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeChannelApi;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeProductApi;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeProductModelApi;
use JustBetter\Akeneo\Tests\Fakes\FakeAkeneoFacade;

/**
 * @see \JustBetter\Akeneo\Integrations\Akeneo
 * @mixin \JustBetter\Akeneo\Integrations\Akeneo
 */
class Akeneo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'akeneo';
    }

    public static function fake(): void
    {
        FakeProductModelApi::setUp();
        FakeProductApi::setUp();
        FakeAttributeApi::setUp();
        FakeChannelApi::setUp();

        self::swap(new FakeAkeneoFacade());
    }
}
