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
    Akeneo::fake();

    $models = Attribute::lazy();

    expect($models)
        ->toBeInstanceOf(LazyCollection::class)
        ->each->toBeInstanceOf(Attribute::class);
});

it('can fetch all attributes from Akeneo and formats it correctly', function () {
    Akeneo::fake();

    $models = Attribute::all();

    expect($models)
        ->toBeInstanceOf(Collection::class)
        ->each->toBeInstanceOf(Attribute::class);
});

it('can find a attribute', function () {
    Akeneo::fake();

    expect(Attribute::find('test'))->toBeInstanceOf(Attribute::class);

    expect(Attribute::find('exception'))->toBeNull();

    expect(Attribute::findOrFail('test'))->toBeInstanceOf(Attribute::class);
});

it('throws an error when a attribute is not found with findOrFail', function () {
    Akeneo::fake();

    Attribute::findOrFail('exception');
})->expectException(ModelNotFoundException::class);

it('can save a attribute', function () {
    Akeneo::fake();

    $model = Attribute::find('test');

    $model->group = 'sales';

    $model->save();

    expect(FakeAttributeApi::$upsert)
        ->code->toBe('test');
});
