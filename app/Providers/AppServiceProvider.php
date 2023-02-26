<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Http\Interfaces\IUserCreate',
            'App\Application\UserCreate'
        );

        $this->app->bind(
            'App\Http\Interfaces\IUserFindAll',
            'App\Application\UserFindAll'
        );

        $this->app->bind(
            'App\Http\Interfaces\IUserFindById',
            'App\Application\UserFindById'
        );

        $this->app->bind(
            'App\Http\Interfaces\IUserDestroy',
            'App\Application\UserDestroy'
        );

        $this->app->bind(
            'App\Http\Interfaces\IUserUpdate',
            'App\Application\UserUpdate'
        );

        $this->app->bind(
            'App\Http\Interfaces\ILogin',
            'App\Application\LoginService'
        );

        // Repositories
        $this->app->bind(
            'App\Application\Interfaces\IPersistUserRepository',
            'App\Infrastructure\PersistenceViaEloquent\Users\UserRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\IFindUserById',
            'App\Infrastructure\PersistenceViaEloquent\Users\UserRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\IDeleteUserRepository',
            'App\Infrastructure\PersistenceViaEloquent\Users\UserRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\IFindUsers',
            'App\Infrastructure\PersistenceViaEloquent\Users\UserRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
