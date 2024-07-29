<?php

namespace OroxMedia\OpenDataSoft;

use OroxMedia\OpenDataSoft\Commands\OpenDataSoftCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
