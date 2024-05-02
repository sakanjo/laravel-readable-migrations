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
    }

    private function registerCommands(): void
    {
        $this->commands([
            Commands\MakeReadableMigrationsCommand::class,
        ]);
    }
}
