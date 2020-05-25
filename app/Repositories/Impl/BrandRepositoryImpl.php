<?php
namespace App\Repositories\Impl;

use App\Brand;
use App\Repositories\BrandRepository;
use App\Repositories\Eloquent\EloquentRepository;

class BrandRepositoryImpl extends EloquentRepository implements BrandRepository
{
    public function getModel()
    {
        $model = Brand::class;

        return $model;
    }

    public function delete($id)
    {
        return   $this->model::onlyTrashed()->where('id', $id)->forceDelete();
    }
};
?>
