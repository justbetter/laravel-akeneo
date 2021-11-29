<?php

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\ProductModel;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeProductModelApi;
use JustBetter\Akeneo\Tests\Fakes\FakeAkeneoFacade;
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

it('can fetch all product models lazily from Akeneo and formats it correctly', function () {
    Akeneo::fake();

    $models = ProductModel::lazy();

    expect($models)
        ->toBeInstanceOf(LazyCollection::class)
        ->each->toBeInstanceOf(ProductModel::class);
});

it('can fetch all product models from Akeneo and formats it correctly', function () {
    Akeneo::fake();

    $models = ProductModel::all();

    expect($models)
        ->toBeInstanceOf(Collection::class)
        ->each->toBeInstanceOf(ProductModel::class);
});

it('can find a product model', function () {
    Akeneo::fake();

    expect(ProductModel::find('test'))->toBeInstanceOf(ProductModel::class);

    expect(ProductModel::find('testing'))->toBeNull();

    expect(ProductModel::findOrFail('test'))->toBeInstanceOf(ProductModel::class);
});

it('throws an error when a model is not found with findOrFail', function () {
    Akeneo::fake();

    ProductModel::findOrFail('testing');
})->expectException(\JustBetter\Akeneo\Exceptions\ModelNotFoundException::class);

it('can change a product model\'s values', function () {
    Akeneo::fake();
    // TODO: Subject to change!

    $model = new ProductModel([
        'code' => 'test',
        'values' => [
            'product_name' => [
                [
                    'scope' => null,
                    'locale' => null,
                    'data' => 'test model',
                ],
            ],
        ],
    ]);

    $model->product_name->setValue('test model 2');

    expect($model->product_name->getSelected()[0]['data'])->toBe('test model 2');
});

it('can save a product model', function () {
    Akeneo::fake();

    $model = ProductModel::find('test');

    $model->product_name->setValue('test product 2');

    $model->save();

    expect(FakeProductModelApi::$upsert)
        ->code->toBe('test');

    expect(FakeProductModelApi::$upsert['data']['values']['product_name'][0]['data'])->toBe('test product 2');
});
