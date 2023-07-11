<?php

namespace Modrictin\StatamicPublicPreview;

use Illuminate\Support\Facades\Route;
use Modrictin\StatamicPublicPreview\Actions\GeneratePublicPreviewLink;
use Modrictin\StatamicPublicPreview\Controllers\PublicPreviewController;
use Statamic\Providers\AddonServiceProvider;

class StatamicPublicPreviewServiceProvider extends AddonServiceProvider
{
    protected $actions = [
        GeneratePublicPreviewLink::class,
    ];

    public function bootAddon()
    {
        $this->handleRoutes();

        $this->handleConfig();
        $this->handleMigrations();

    }

    private function handleConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/statamic-public-preview.php', 'statamic.statamic-public-preview');

        $this->publishes([
            __DIR__.'/../config/statamic-public-preview.php' => config_path('statamic/statamic-public-preview.php'),
        ], 'public-preview-config');
    }

    private function handleRoutes(): void
    {
        $this->registerWebRoutes(function () {
            Route::get('/public-preview/{id}', [PublicPreviewController::class, 'show'])->name('cms.public-preview');
        });
    }

    private function handleMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
