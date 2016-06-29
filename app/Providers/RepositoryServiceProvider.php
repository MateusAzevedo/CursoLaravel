<?php

namespace CursoLaravel\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'CursoLaravel\Repositories\Client\ClientRepository',
            'CursoLaravel\Repositories\Client\ClientRepositoryEloquent'
        );

        $this->app->bind(
            'CursoLaravel\Repositories\Project\ProjectRepository',
            'CursoLaravel\Repositories\Project\ProjectRepositoryEloquent'
        );

        $this->app->bind(
            'CursoLaravel\Repositories\Project\ProjectNoteRepository',
            'CursoLaravel\Repositories\Project\ProjectNoteRepositoryEloquent'
        );
    }
}
