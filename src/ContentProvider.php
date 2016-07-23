<?php

namespace Seat\ConMan;

use Illuminate\Support\ServiceProvider;

class ContentProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->addRoutes();
        $this->addViews();
        $this->addTranslations();
        $this->addPublications();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function addRoutes()
    {
        if (!$this->app->routesAreCached()) {
            include __DIR__ . '/Http/routes.php';
        }
    }

    public function addViews()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'teamspeak');
    }

    public function addTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'teamspeak');
    }

    public function addPublications()
    {
        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations')
        ]);
    }
}