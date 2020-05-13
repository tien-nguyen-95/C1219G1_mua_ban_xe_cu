<?php

namespace App\Providers;


use App\Services\BrandService;
use App\Repositories\Impl\BrandRepositoryImpl;
use App\Repositories\BrandRepository;
use App\Services\Impl\BrandServiceImpl;

use App\Repositories\CategoryRepository;
use App\Repositories\Impl\CategoryRepositoryImpl;
use App\Services\CategoryService;
use App\Services\Impl\CategoryServiceImpl;

use Illuminate\Support\ServiceProvider;
use App\Services\BranchService;
use App\Repositories\Impl\BranchRepositoryImpl;
use App\Repositories\BranchRepository;
use App\Services\Impl\BranchServiceImpl;


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
            CategoryRepository::class,
            CategoryRepositoryImpl::class
        );
        $this->app->singleton(
            CategoryService::class,
            CategoryServiceImpl::class
        );
        
        $this->app->singleton(
            BranchRepository::class,
            BranchRepositoryImpl::class
        );
        $this->app->singleton(
            BranchService::class,
            BranchServiceImpl::class
        );

        $this->app->singleton(
            BrandRepository::class,
            BrandRepositoryImpl::class
        );
        $this->app->singleton(
            BrandService::class,
            BrandServiceImpl::class
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
