<?php

namespace App\Providers;

use App\Services\BrandService;
use App\Services\Impl\BranServiceImpl;
use App\Reponsitories\BrandReponsitory;
use App\Reponsitories\Impl\BrandRepositoryImpl;
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
        //
        $this->app->singleton(
            BrandReponsitory::class,
            BrandRepositoryImpl::class
        );

        $this->app->singleton(
            BrandService::class,
            BranServiceImpl::class
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
