<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Repository;

abstract class EloquentRepository implements Repository
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get Model
     * @return string
     */
    abstract public function getModel();

    /**
     * set Model
     */
    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {
        $result = $this->model->all();

        return $result;
    }

    public function findById($id)
    {
        $result = $this->model->find($id);
        return $result;
    }

    public function create($data)
    {
        try {
            $object = $this->model->create($data);
        } catch (\Exception $e) {
            return $e->getMessage();
            // return null;
        }
        return $object;
    }

    
    public function update($data, $object)
    {
        try {
            $object->update($data);
            return $object;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($object)
    {
        $object->delete();
    }

    public function getTrash(){

        $result = $this->model->onlyTrashed()->get();
        
        return $result;
    }

    public function restore($id)
    {
        return $this->model::onlyTrashed()->where('id', $id)->restore();
    }

    public function delete($id)
    {
        return $this->model::onlyTrashed()->where('id', $id)->forceDelete();
    }
}

