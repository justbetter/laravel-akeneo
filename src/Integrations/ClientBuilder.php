<?php

namespace JustBetter\Akeneo\Integrations;

use Akeneo\Pim\ApiClient\AkeneoPimClientBuilder;

class ClientBuilder
{
    public static function build(string $url): AkeneoPimClientBuilder
    {
        return new AkeneoPimClientBuilder($url);
    }
}
