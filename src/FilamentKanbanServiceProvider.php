<?php

namespace Sector7\FilamentKanban;

use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Sector7\FilamentKanban\Commands\MakeKanbanBoardCommand;
use Sector7\FilamentKanban\Testing\TestsFilamentKanban;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentKanbanServiceProvider extends PackageServiceProvider
{
    public static string $name = 'sector7-filament-kanban';

    public static string $viewNamespace = 'filament-kanban';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasAssets()
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishAssets()
                    ->askToStarRepoOnGitHub('jmillan-ve/sector7-filament-kanban');
            });


    }

    public function packageBooted(): void
    {
        file_put_contents('/tmp/kanban-boot.log', "packageBooted called\n", FILE_APPEND);

        // Views Registration
        $viewsPath = __DIR__ . '/../resources/views';
        if (file_exists($viewsPath)) {
            $this->loadViewsFrom($viewsPath, 'filament-kanban');
            file_put_contents('/tmp/kanban-boot.log', "loadViewsFrom called: $viewsPath\n", FILE_APPEND);
        } else {
            file_put_contents('/tmp/kanban-boot.log', "views path not found: $viewsPath\n", FILE_APPEND);
        }

        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-kanban/{$file->getFilename()}"),
                ], 'filament-kanban-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsFilamentKanban);
    }

    protected function getAssetPackageName(): ?string
    {
        return 'sector7/filament-kanban';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-kanban', __DIR__ . '/../resources/dist/components/filament-kanban.js'),
            // Js::make('filament-kanban-scripts', __DIR__ . '/../resources/dist/filament-kanban.js'),
            Css::make('filament-kanban-styles', __DIR__ . '/../resources/dist/filament-kanban.css'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            MakeKanbanBoardCommand::class,
        ];
    }
}
