<?php

namespace App\Providers;

use App\Entities\Offer;
use App\Entities\Tag;
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
        $this->app->bind(
            'App\Repositories\Providers\Tag\TagRepository',
            function () {
                return new \App\Repositories\Providers\Tag\Eloquent\EloquentTagRepository(new Tag());
            }
        );
        $this->app->bind(
            'App\Repositories\Providers\Offer\OfferRepository',
            function () {
                return new \App\Repositories\Providers\Offer\Eloquent\EloquentOfferRepository(new Offer());
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
