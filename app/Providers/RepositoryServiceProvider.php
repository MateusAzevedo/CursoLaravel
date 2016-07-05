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
        $this->registerClientRepository();

        $this->registerProjectRepository();
    }

    /**
     * Register repositories for Client resource.
     */
    private function registerClientRepository()
    {
        $this->app->bind(
            'CursoLaravel\Repositories\Client\ClientRepository',
            'CursoLaravel\Repositories\Client\ClientRepositoryEloquent'
        );
    }

    /**
     * Register repositories for Project resource.
     */
    private function registerProjectRepository()
    {
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
