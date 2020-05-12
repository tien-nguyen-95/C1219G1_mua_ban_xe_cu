<?php

namespace App\Repositories\Impl;

use App\Branch;
use App\Repositories\BranchRepository;
use App\Repositories\Eloquent\EloquentRepository;

class BranchRepositoryImpl extends EloquentRepository  implements BranchRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Branch::class;
        return $model;
    }

    public function findTrashById($id){
        $result = $this->model->onlyTrashed($id)->where('id', $id)->first();
        return $result;
    }

    public function restore($object){
        $object->restore();
    }

    public function delete($object){
        $object->forceDelete();
    }
}
