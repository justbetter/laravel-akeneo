<?php

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Exceptions\ModelNotFoundException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Channel;
use JustBetter\Akeneo\Models\Product;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeChannelApi;
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

it('can fetch all channels from Akeneo lazily and formats it correctly', function () {
    Akeneo::spy()
        ->expects('getChannelApi')
        ->andReturn(new FakeChannelApi());

    $models = Channel::lazy();

    expect($models)
        ->toBeInstanceOf(LazyCollection::class)
        ->each->toBeInstanceOf(Channel::class);
});

it('can fetch all channels from Akeneo and formats it correctly', function () {
    Akeneo::spy()
        ->expects('getChannelApi')
        ->andReturn(new FakeChannelApi());

    $models = Channel::all();

    expect($models)
        ->toBeInstanceOf(Collection::class)
        ->each->toBeInstanceOf(Channel::class);
});

it('can find a channel', function () {
    Akeneo::spy()
        ->expects('getChannelApi')
        ->times(3)
        ->andReturn(new FakeChannelApi());

    expect(Channel::find('test'))->toBeInstanceOf(Channel::class);

    expect(Channel::find('testing'))->toBeNull();

    expect(Channel::findOrFail('test'))->toBeInstanceOf(Channel::class);
});
