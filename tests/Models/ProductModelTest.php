<?php

use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\ProductModel;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeProductModelApi;
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

it('can fetch all product models from Akeneo and formats it correctly', function () {
    Akeneo::spy()
        ->expects('getProductModelApi')
        ->andReturn(new FakeProductModelApi());

    $models = ProductModel::all();

    expect($models)
        ->toBeInstanceOf(LazyCollection::class)
        ->each->toBeInstanceOf(ProductModel::class);
});

it('can find a product model', function () {
    Akeneo::spy()
        ->expects('getProductModelApi')
        ->times(3)
        ->andReturn(new FakeProductModelApi());

    expect(ProductModel::find('test'))->toBeInstanceOf(ProductModel::class);

    expect(ProductModel::find('testing'))->toBeNull();

    expect(ProductModel::findOrFail('test'))->toBeInstanceOf(ProductModel::class);
});

it('throws an error when a model is not found with findOrFail', function () {
    Akeneo::spy()
        ->expects('getProductModelApi')
        ->andReturn(new FakeProductModelApi());


    ProductModel::findOrFail('testing');
})->expectException(\JustBetter\Akeneo\Exceptions\ModelNotFoundException::class);

it('can change values', function () {
    // TODO: Subject to change!

    $model = new ProductModel([
        'code' => 'test',
        'values' => [
            'product_name' => [
                [
                    'scope' => 'akeneo',
                    'locale' => 'nl_NL',
                    'data' => 'test model',
                ]
            ]
        ]
    ]);

    $model->setValue('product_name', 'test model 2');

    expect($model->values['product_name'][0]['data'])->toBe('test model 2');
});


it('can save a product model', function () {
    $fakeProductModelApi = new FakeProductModelApi();
    Akeneo::spy()
        ->expects('getProductModelApi')
        ->times(2)
        ->andReturn($fakeProductModelApi);

    $model = ProductModel::find('test');

    $model->setValue('product_name', 'test product 2');

    $model->save();

    expect($fakeProductModelApi->upsert)
        ->code->toBe('test');

    expect($fakeProductModelApi->upsert['data']['values']['product_name'][0]['data'])->toBe('test product 2');
});
