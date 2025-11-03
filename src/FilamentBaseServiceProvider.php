<?php

namespace NootPro\FilamentBase;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use NootPro\FilamentBase\Commands\FilamentBaseCommand;
use NootPro\FilamentBase\Testing\TestsFilamentBase;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentBaseServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-base';

    public static string $viewNamespace = 'filament-base';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name);
//            ->hasCommands($this->getCommands())
//            ->hasInstallCommand(function (InstallCommand $command) {
//                $command
//                    ->publishConfigFile()
//                    ->publishMigrations()
//                    ->askToRunMigrations()
//                    ->askToStarRepoOnGitHub('noot-pro/filament-base');
//            })

        $configFileName = $package->shortName();

//        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
//            $package->hasConfigFile();
//        }
//
//        if (file_exists($package->basePath('/../database/migrations'))) {
//            $package->hasMigrations($this->getMigrations());
//        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Asset Registration
//        FilamentAsset::register(
//            $this->getAssets(),
//            $this->getAssetPackageName()
//        );
//
//        FilamentAsset::registerScriptData(
//            $this->getScriptData(),
//            $this->getAssetPackageName()
//        );

        // Icon Registration
//        FilamentIcon::register($this->getIcons());

        // Handle Stubs
//        if (app()->runningInConsole()) {
//            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
//                $this->publishes([
//                    $file->getRealPath() => base_path("stubs/filament-base/{$file->getFilename()}"),
//                ], 'filament-base-stubs');
//            }
//        }

        // Testing
//        Testable::mixin(new TestsFilamentBase);
    }

    protected function getAssetPackageName(): ?string
    {
        return 'noot-pro/filament-base';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-base', __DIR__ . '/../resources/dist/components/filament-base.js'),
            Css::make('filament-base-styles', __DIR__ . '/../resources/dist/filament-base.css'),
            Js::make('filament-base-scripts', __DIR__ . '/../resources/dist/filament-base.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            FilamentBaseCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_filament-base_table',
        ];
    }
}
