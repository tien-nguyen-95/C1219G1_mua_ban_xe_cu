<?php
namespace App\Reponsitories\Impl;

use App\Brand;
use App\Reponsitories\BrandReponsitory;
use App\Reponsitories\Eloquent\EloquentRepository;

class BrandRepositoryImpl extends EloquentRepository implements BrandReponsitory
{
    public function getModel()
    {
        $model = Brand::class;
        return $model;
    }
};
?>
