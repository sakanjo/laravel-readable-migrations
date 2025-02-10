<?php

namespace SaKanjo\ReadableMigrations;

use Illuminate\Support\ServiceProvider;

class ReadableMigrationsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }

        $this->mergeConfigFrom(__DIR__.'/../config/readable-migrations.php', 'readable-migrations');
    }

    private function registerCommands(): void
    {
        $this->commands([
            Commands\MakeReadableMigrationsCommand::class,
        ]);
    }
}
