<?php

namespace Modrictin\StatamicPublicPreview\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modrictin\StatamicPublicPreview\StatamicPublicPreviewServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Modrictin\\StatamicPublicPreview\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            StatamicPublicPreviewServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_statamic-public-preview_table.php.stub';
        $migration->up();
        */
    }
}
