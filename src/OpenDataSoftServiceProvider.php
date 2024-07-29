<?php

namespace OroxMedia\OpenDataSoft;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use OroxMedia\OpenDataSoft\Commands\OpenDataSoftCommand;

class OpenDataSoftServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('opendatasoft')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_opendatasoft_table')
            ->hasCommand(OpenDataSoftCommand::class);
    }
}
