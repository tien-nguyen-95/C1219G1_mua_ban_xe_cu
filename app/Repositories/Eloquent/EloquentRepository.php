<?php
namespace App\Reponsitories\Eloquent;

use App\Brand;
use App\Reponsitories\Reponsitory;

abstract class EloquentRepository implements Reponsitory
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
// dd( app()->make($this->getModel()));
        $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {

// dd($this->model);
        $result = $this->model::all();
        return $result;
    }

    public function findById($id)
    {
        $result = $this->model->findOrFail($id);
        return $result;
    }

    public function create($data)
    {
        try{
            $object = $this->model->create($data);
        }catch(\Exception $e) {
            return null;
        }
        return $object;
    }

    public function update($data, $object)
    {
        $object->update($data);
        return $object;
    }

    public function destroy($object)
    {
        $object->delete();
    }
};
?>
