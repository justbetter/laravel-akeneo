<?php

use JustBetter\Akeneo\Exceptions\AkeneoConfigurationException;
use JustBetter\Akeneo\Facades\Akeneo;

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
