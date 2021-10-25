<?php

use Akeneo\Pim\ApiClient\AkeneoPimClientBuilder;
use JustBetter\Akeneo\Integrations\ClientBuilder;

it('builds the client', function () {
    expect(ClientBuilder::build('https://default.akeneo.nl'))
        ->toBeInstanceOf(AkeneoPimClientBuilder::class);
});
