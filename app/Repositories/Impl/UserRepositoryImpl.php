<?php

namespace App\Repositories\Impl;

use App\User;
use App\Repositories\UserRepository;
use App\Repositories\Eloquent\EloquentRepository;

class UserRepositoryImpl extends EloquentRepository  implements UserRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = User::class;
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
