<?php

use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\ProductModel;
use JustBetter\Akeneo\Tests\Fakes\FakeClientBuilder;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeProductModelApi;

beforeEach(function () {
    config()->set('akeneo.connections.default', [
        'url' => 'https://default.akeneo.nl',
        'client_id' => '::string::',
        'secret' => '::string::',
        'username' => '::string::',
        'password' => '::string::',
    ]);

    app()->bind('clientBuilder', FakeClientBuilder::class);
});

it('can fetch all product models from Akeneo and formats it correctly', function () {
    Akeneo::spy()
        ->expects('getProductModelApi')
        ->andReturn(new FakeProductModelApi());

    $models = ProductModel::all();

    expect($models)
        ->toBeInstanceOf(LazyCollection::class)
        ->each->toBeInstanceOf(ProductModel::class);
});
