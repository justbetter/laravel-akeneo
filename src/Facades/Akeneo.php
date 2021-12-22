<?php

namespace JustBetter\Akeneo\Facades;

use Akeneo\Pim\ApiClient\Api\AttributeApiInterface;
use Akeneo\Pim\ApiClient\Api\AttributeOptionApi;
use Akeneo\Pim\ApiClient\Api\ChannelApiInterface;
use Akeneo\Pim\ApiClient\Api\ProductApiInterface;
use Akeneo\Pim\ApiClient\Api\ProductModelApiInterface;
use Illuminate\Support\Facades\Facade;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeAttributeApi;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeChannelApi;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeProductApi;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeProductModelApi;
use JustBetter\Akeneo\Tests\Fakes\FakeAkeneoFacade;

/**
 * @method static ProductModelApiInterface getProductModelApi()
 * @method static ProductApiInterface getProductApi()
 * @method static AttributeApiInterface getAttributeApi()
 * @method static ChannelApiInterface getChannelApi()
 * @method static AttributeOptionApi getAttributeOptionApi()
 *
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
