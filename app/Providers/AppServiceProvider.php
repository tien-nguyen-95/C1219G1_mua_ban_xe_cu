<?php

namespace App\Providers;

use App\Repositories\TagRepository;
use App\Repositories\Impl\TagRepositoryImpl;
use App\Services\TagService;
use App\Services\Impl\TagServiceImpl;
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
            TagRepository::class,
            TagRepositoryImpl::class
        );
        $this->app->singleton(
            TagService::class,
            TagServiceImpl::class
        );
        $this->app->singleton(
            BranchRepository::class,
            BranchRepositoryImpl::class
        );
        $this->app->singleton(
            BranchService::class,
            BranchServiceImpl::class

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
