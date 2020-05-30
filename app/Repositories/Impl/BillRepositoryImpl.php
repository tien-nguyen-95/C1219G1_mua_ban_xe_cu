<?php
namespace App\Repositories\Impl;

use App\Bill;

use App\Repositories\BillRepository;
use App\Repositories\Eloquent\EloquentRepository;

class BillRepositoryImpl extends EloquentRepository  implements BillRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Bill::class;
        return $model;
    }

    public function getAll()
    {
        $bills = $this->model->all();
        
        foreach($bills as $bill){
            $bill['customer'] =  $bill->customer;
            $bill['product'] =  $bill->product->branch;
        }
        return $bills;
    }

    public function findById($id)
    {
        $bill = $this->model->find($id);
        
        return $bill;
    }

    public function getTrash()
    {
        $bills = $this->model->onlyTrashed()->get();
        foreach($bills as $bill){
            $bill['customer'] =  $bill->customer;
            $bill['product'] =  $bill->product->branch;
        }
        return $bills;
    }

}