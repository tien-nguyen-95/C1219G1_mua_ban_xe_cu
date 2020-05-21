<?php
namespace App\Repositories\Impl;

use App\Product;
use App\Repositories\ProductRepository;
use App\Repositories\Eloquent\EloquentRepository;

class ProductRepositoryImpl extends EloquentRepository implements ProductRepository
{
    public function getModel()
    {
        $model = Product::class;
        return $model;
    }

    public function delete($id)
    {
        return   $this->model::onlyTrashed()->where('id', $id)->forceDelete();
    }

    public function getAllJoin()
    { 
        $result = $this->model->all();
        foreach ($result  as $val) {
            $result->branch_name  = $val->branch->name;
            $result->brand_name  = $val->brand->name;
            $result->tag_name  = $val->tag->name;
            $result->category_name   = $val->category->name;
       }

        return $result;
    }
};
