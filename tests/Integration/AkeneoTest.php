<?php

use JustBetter\Akeneo\Exceptions\AkeneoConfigurationException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Tests\Fakes\FakeClientBuilder;

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

it('must have valid url', function ($url) {
    config()->set('akeneo.connections.default', [
        'url' => $url,
    ]);

    Akeneo::getAttributeApi();
})->with([
    '',
    'akeneo.com',
    'https://akeneo'
])->expectException(AkeneoConfigurationException::class);

it('can have multiple connections', function () {
    config()->set('akeneo.connections.instance2', [
        'url' => 'https://instance2.akeneo.nl',
        'client_id' => '::string::',
        'secret' => '::string::',
        'username' => '::string::',
        'password' => '::string::',
    ]);

    $connection = Akeneo::connection('instance2');

    $connection->assertUrl('https://instance2.akeneo.nl');

});

test('the connection must be defined', function () {
    Akeneo::connection('instance2')->getAttributeApi();
})->expectException(AkeneoConfigurationException::class);

it('throws exception when method does not exist on client', function () {
    Akeneo::fakeMethod();

})->expectException(BadMethodCallException::class);
