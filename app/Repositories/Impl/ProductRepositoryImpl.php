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
            $val->branch->name;
            $val->brand->name;
            $val->tag->name;
            $val->category->name;
            $val->staff->name;
       }

        return $result;
    }


    public function findByIdJoin($id)
    {
        $result = $this->model->find($id);
            
            $result->branch->name;
            $result->brand->name;
            $result->tag->name;
            $result->category->name;
            $result->staff->name;

        return $result;
    }

    public function getTrash(){

        $result = $this->model->onlyTrashed()->get();

        foreach ($result  as $val) {
            $val->branch->name;
            $val->brand->name;
            $val->tag->name;
            $val->category->name;
            $val->staff->name;
       }

        return $result;
    }
  
};
