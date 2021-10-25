<?php

use Akeneo\Pim\ApiClient\AkeneoPimClientBuilder;
use JustBetter\Akeneo\Exceptions\AkeneoConfigurationException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Integrations\ClientBuilder;
use JustBetter\Akeneo\Tests\Fakes\FakeClientBuilder;

//beforeEach(function () {
//    config()->set('akeneo.connections.default', [
//        'url' => 'https://default.akeneo.nl',
//        'client_id' => '::string::',
//        'secret' => '::string::',
//        'username' => '::string::',
//        'password' => '::string::',
//    ]);
//});

it('builds the client', function () {
    expect(ClientBuilder::build('https://default.akeneo.nl'))
        ->toBeInstanceOf(AkeneoPimClientBuilder::class);
});
