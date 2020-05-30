<?php

namespace App\Providers;

use App\Entities\Vacancy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Providers\Vacancy\VacancyRepository',
            function () {
                return new \App\Repositories\Providers\Vacancy\Eloquent\EloquentVacancyRepository(new Vacancy());
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
