<?php

namespace JustBetter\Akeneo;

use JustBetter\Akeneo\Integrations\Akeneo;
use JustBetter\Akeneo\Integrations\ClientBuilder;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AkeneoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $this->app->bind('akeneo', Akeneo::class);
        $this->app->bind('clientBuilder', ClientBuilder::class);

        $package
            ->name('akeneo')
            ->hasConfigFile();
    }
}
