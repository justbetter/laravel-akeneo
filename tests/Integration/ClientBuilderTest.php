<?php

use Akeneo\Pim\ApiClient\AkeneoPimClientBuilder;
use JustBetter\Akeneo\Integrations\ClientBuilder;

it('builds the client', function () {
    expect(ClientBuilder::create('https://default.akeneo.nl'))
        ->toBeInstanceOf(AkeneoPimClientBuilder::class);
});
