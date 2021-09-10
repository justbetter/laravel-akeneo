<?php

namespace JustBetter\Akeneo;

use JustBetter\Akeneo\Integrations\Akeneo;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AkeneoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $this->app->bind('akeneo', Akeneo::class);

        $package
            ->name('akeneo')
            ->hasConfigFile();
    }
}
