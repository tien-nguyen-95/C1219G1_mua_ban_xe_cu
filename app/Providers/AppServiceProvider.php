<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Impl\CategoryRepositoryImpl;
use App\Services\CategoryService;
use App\Services\Impl\CategoryServiceImpl;

use Illuminate\Support\ServiceProvider;

use App\Services\BranchService;
use App\Repositories\Impl\BranchRepositoryImpl;
use App\Repositories\BranchRepository;
use App\Services\Impl\BranchServiceImpl;

use App\Repositories\CustomerRepository;
use App\Repositories\Impl\CustomerRepositoryImpl;
use App\Services\CustomerService;
use App\Services\Impl\CustomerServiceImpl;

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
            CustomerRepository::class,
            CustomerRepositoryImpl::class
        );
        $this->app->singleton(
            CustomerService::class,
            CustomerServiceImpl::class
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
