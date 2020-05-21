<?php

namespace App\Repositories\Impl;

use App\Staff;
use App\Repositories\StaffRepository;
use App\Repositories\Eloquent\EloquentRepository;

class StaffRepositoryImpl extends EloquentRepository  implements StaffRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Staff::class;
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
