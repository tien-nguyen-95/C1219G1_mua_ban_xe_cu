<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Repositories\TagRepository;
use App\Repositories\Impl\TagRepositoryImpl;
use App\Services\TagService;
use App\Services\Impl\TagServiceImpl;


use App\Services\BrandService;
use App\Repositories\Impl\BrandRepositoryImpl;
use App\Repositories\BrandRepository;
use App\Services\Impl\BrandServiceImpl;

use App\Repositories\CategoryRepository;
use App\Repositories\Impl\CategoryRepositoryImpl;
use App\Services\CategoryService;
use App\Services\Impl\CategoryServiceImpl;

use App\Repositories\StaffRepository;
use App\Repositories\Impl\StaffRepositoryImpl;
use App\Services\StaffService;
use App\Services\Impl\StaffServiceImpl;

use App\Services\BranchService;
use App\Repositories\Impl\BranchRepositoryImpl;
use App\Repositories\BranchRepository;
use App\Services\Impl\BranchServiceImpl;

use App\Services\UserService;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\UserRepository;
use App\Services\Impl\UserServiceImpl;

use App\Repositories\CustomerRepository;
use App\Repositories\Impl\CustomerRepositoryImpl;
use App\Services\CustomerService;
use App\Services\Impl\CustomerServiceImpl;

use App\Services\PositionService;
use App\Repositories\Impl\PositionRepositoryImpl;
use App\Repositories\PositionRepository;
use App\Services\Impl\PositionServiceImpl;

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
            PositionRepository::class,
            PositionRepositoryImpl::class
        );

        $this->app->singleton(
            PositionService::class,
            PositionServiceImpl::class,
        );

        $this->app->singleton(
            StaffRepository::class,
            StaffRepositoryImpl::class
        );


        $this->app->singleton(
            StaffService::class,
            StaffServiceImpl::class
        );

        $this->app->singleton(
            UserService::class,
            UserServiceImpl::class

        );

        $this->app->singleton(
            UserRepository::class,
            UserRepositoryImpl::class
        );

        $this->app->singleton(
            CustomerRepository::class,
            CustomerRepositoryImpl::class
        );

        $this->app->singleton(
            CustomerService::class,
            CustomerServiceImpl::class
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
