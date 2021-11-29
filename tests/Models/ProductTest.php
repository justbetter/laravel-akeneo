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
    Akeneo::fake();

    $models = Product::lazy();

    expect($models)
        ->toBeInstanceOf(LazyCollection::class)
        ->each->toBeInstanceOf(Product::class);
});

it('can fetch all products from Akeneo and formats it correctly', function () {
    Akeneo::fake();

    $models = Product::all();

    expect($models)
        ->toBeInstanceOf(Collection::class)
        ->each->toBeInstanceOf(Product::class);
});

it('can find a product', function () {
    Akeneo::fake();

    expect(Product::find('test'))->toBeInstanceOf(Product::class);

    expect(Product::find('exception'))->toBeNull();

    expect(Product::findOrFail('test'))->toBeInstanceOf(Product::class);
});

it('throws an error when a product is not found with findOrFail', function () {
    Akeneo::fake();

    Product::findOrFail('exception');
})->expectException(\JustBetter\Akeneo\Exceptions\ModelNotFoundException::class);

it('can change a product\'s values', function () {
    Akeneo::fake();
    $product = new Product([
        'identifier' => 'test',
        'values'     => [
            'product_name' => [
                [
                    'scope'  => null,
                    'locale' => null,
                    'data'   => 'test model',
                ],
            ],
        ],
    ]);

    $product->product_name->setValue('test model 2');

    expect($product->product_name->getSelected()[0]['data'])->toBe('test model 2');
});

it('can save a product', function () {
    Akeneo::fake();

    $model = Product::find('test');

    $model->product_name->setValue('test product 2');

    $model->save();

    expect(FakeProductApi::$upsert)
        ->code->toBe('test');

    expect(FakeProductApi::$upsert['data']['values']['product_name'][0]['data'])->toBe('test product 2');
});

it('can delete a product', function () {
    Akeneo::fake();

    $model = Product::find('test');
    $model->delete();

    expect(FakeProductApi::$delete)->toBe('test');
});
