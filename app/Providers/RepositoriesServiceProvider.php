<?php

namespace App\Providers;

use App\Contracts\EloquentRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Contracts\FrogRepositoryInterface;
use App\Repositories\FrogRepository;
use App\Contracts\TypeRepositoryInterface;
use App\Repositories\TypeRepository;
use App\Contracts\MateRepositoryInterface;
use App\Contracts\WeatherRepositoryInterface;
use App\Repositories\MateRepository;
use App\Repositories\WeatherRepository;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     * 
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRe::class);
        $this->app->bind(FrogRepositoryInterface::class, FrogRepository::class);
        $this->app->bind(TypeRepositoryInterface::class, TypeRepository::class);
        $this->app->bind(MateRepositoryInterface::class, MateRepository::class);
        $this->app->bind(WeatherRepositoryInterface::class, WeatherRepository::class);
    }
}
