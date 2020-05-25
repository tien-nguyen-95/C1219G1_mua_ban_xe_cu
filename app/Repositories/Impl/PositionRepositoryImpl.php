<?php

namespace App\Repositories\Impl;

use App\Position;
use App\Repositories\PositionRepository;
use App\Repositories\Eloquent\EloquentRepository;

class PositionRepositoryImpl extends EloquentRepository  implements PositionRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Position::class;

        return $model;
    }

    public function findTrashById($id)
    {
        $result = $this->model->onlyTrashed($id)->where('id', $id)->first();

        return $result;
    }

    public function restore($object)
    {
        $object->restore();
    }

    public function delete($object)
    {
        $object->forceDelete();
    }
}
