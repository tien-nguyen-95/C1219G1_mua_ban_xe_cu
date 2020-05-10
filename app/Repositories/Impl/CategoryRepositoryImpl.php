<?php
namespace App\Repositories\Impl;

use App\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\Eloquent\EloquentRepository;

class CategoryRepositoryImpl extends EloquentRepository  implements CategoryRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Category::class;
        return $model;
    }
}
