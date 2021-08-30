<?php

namespace JustBetter\Akeneo;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JustBetter\Akeneo\Commands\AkeneoCommand;

class AkeneoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('akeneo')
            ->hasConfigFile();
    }
}
