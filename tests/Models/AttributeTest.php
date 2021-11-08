<?php

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Exceptions\ModelNotFoundException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Attribute;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeAttributeApi;
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

it('can fetch all attributes from Akeneo lazily and format it correctly', function () {
    Akeneo::spy()
        ->expects('getAttributeApi')
        ->andReturn(new FakeAttributeApi());

    $models = Attribute::lazy();

    expect($models)
        ->toBeInstanceOf(LazyCollection::class)
        ->each->toBeInstanceOf(Attribute::class);
});

it('can fetch all attributes from Akeneo and formats it correctly', function () {
    Akeneo::spy()
        ->expects('getAttributeApi')
        ->andReturn(new FakeAttributeApi());

    $models = Attribute::all();

    expect($models)
        ->toBeInstanceOf(Collection::class)
        ->each->toBeInstanceOf(Attribute::class);
});

it('can find a attribute', function () {
    Akeneo::spy()
        ->expects('getAttributeApi')
        ->times(3)
        ->andReturn(new FakeAttributeApi());

    expect(Attribute::find('test'))->toBeInstanceOf(Attribute::class);

    expect(Attribute::find('testing'))->toBeNull();

    expect(Attribute::findOrFail('test'))->toBeInstanceOf(Attribute::class);
});

it('throws an error when a attribute is not found with findOrFail', function () {
    Akeneo::spy()
        ->expects('getAttributeApi')
        ->andReturn(new FakeAttributeApi());

    Attribute::findOrFail('testing');
})->expectException(ModelNotFoundException::class);

it('can save a attribute', function () {
    $fakeAttributeApi = new FakeAttributeApi();

    Akeneo::spy()
        ->expects('getAttributeApi')
        ->times(2)
        ->andReturn($fakeAttributeApi);

    $model = Attribute::find('test');

    $model->group = 'sales';

    $model->save();

    expect($fakeAttributeApi->upsert)
        ->code->toBe('test');
});
