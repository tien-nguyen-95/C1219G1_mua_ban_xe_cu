<?php

namespace App\Providers;

use App\Repositories\TagRepository;
use App\Repositories\Impl\TagRepositoryImpl;
use App\Services\TagService;
use App\Services\Impl\TagServiceImpl;
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
        $this->app->singleton(
            TagRepository::class,
            TagRepositoryImpl::class
        );
        $this->app->singleton(
            TagService::class,
            TagServiceImpl::class
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
