<?php
namespace App\Repositories\Impl;

use App\Bill;
use App\Customer;
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
        // foreach($bills as $bill){
        //     $bill->customer_id =  $bill->customer;
        //     $bill->product_id =  $bill->product;
        // }
        return $bills;
    }

    public function findById($id)
    {
        $bill = $this->model->find($id);
        
        return $bill;
    }

}