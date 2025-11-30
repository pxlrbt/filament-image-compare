<?php

namespace pxlrbt\FilamentImageCompare;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentImageCompareServiceProvider extends PackageServiceProvider
{
    public static string $name = 'pxlrbt/image-compare';

    public function configurePackage(Package $package): void
    {
        FilamentAsset::register([
            Css::make('image-compare', __DIR__.'/../resources/image-compare.css'),
        ], static::$name);

        $package
            ->name(static::$name);
    }
}
