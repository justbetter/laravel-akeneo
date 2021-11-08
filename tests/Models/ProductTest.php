<?php

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Product;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeProductApi;
use JustBetter\Akeneo\Tests\Fakes\FakeClientBuilder;

beforeEach(function () {
    config()->set('akeneo.connections.default', [
        'url'       => 'https://default.akeneo.nl',
        'client_id' => '::string::',
        'secret'    => '::string::',
        'username'  => '::string::',
        'password'  => '::string::',
    ]);

    app()->bind('clientBuilder', FakeClientBuilder::class);
});

it('can fetch all products from Akeneo lazily and formats it correctly', function () {
    Akeneo::spy()
        ->expects('getProductApi')
        ->andReturn(new FakeProductApi());

    $models = Product::lazy();

    expect($models)
        ->toBeInstanceOf(LazyCollection::class)
        ->each->toBeInstanceOf(Product::class);
});

it('can fetch all products from Akeneo and formats it correctly', function () {
    Akeneo::spy()
        ->expects('getProductApi')
        ->andReturn(new FakeProductApi());

    $models = Product::all();

    expect($models)
        ->toBeInstanceOf(Collection::class)
        ->each->toBeInstanceOf(Product::class);
});

it('can find a product', function () {
    Akeneo::spy()
        ->expects('getProductApi')
        ->times(3)
        ->andReturn(new FakeProductApi());

    expect(Product::find('test'))->toBeInstanceOf(Product::class);

    expect(Product::find('testing'))->toBeNull();

    expect(Product::findOrFail('test'))->toBeInstanceOf(Product::class);
});

it('throws an error when a product is not found with findOrFail', function () {
    Akeneo::spy()
        ->expects('getProductApi')
        ->andReturn(new FakeProductApi());

    Product::findOrFail('testing');
})->expectException(\JustBetter\Akeneo\Exceptions\ModelNotFoundException::class);

it('can change a product\'s values', function () {
    // TODO: Subject to change!

    $product = new Product([
        'identifier' => 'test',
        'values'     => [
            'product_name' => [
                [
                    'scope'  => 'akeneo',
                    'locale' => 'nl_NL',
                    'data'   => 'test model',
                ],
            ],
        ],
    ]);

    $product->setValue('product_name', 'test model 2');

    expect($product->values['product_name'][0]['data'])->toBe('test model 2');
});

it('can save a product', function () {
    $fakeProductApi = new FakeProductApi();

    Akeneo::spy()
        ->expects('getProductApi')
        ->times(2)
        ->andReturn($fakeProductApi);

    $model = Product::find('test');

    $model->setValue('product_name', 'test product 2');

    $model->save();

    expect($fakeProductApi->upsert)
        ->code->toBe('test');

    expect($fakeProductApi->upsert['data']['values']['product_name'][0]['data'])->toBe('test product 2');
});

it('can delete a product', function () {
    $fakeProductApi = new FakeProductApi();

    Akeneo::spy()
        ->expects('getProductApi')
        ->times(2)
        ->andReturn($fakeProductApi);

    $model = Product::find('test');
    $model->delete();

    expect($fakeProductApi->delete)->toBe('test');
});
