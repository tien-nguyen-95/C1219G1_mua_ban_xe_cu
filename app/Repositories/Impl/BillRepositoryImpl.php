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
            $bill['branch'] = $bill->branch;
            $bill['customer'] =  $bill->customer;
            
        }
        return $bills;
    }

    // public function findById($id)
    // {
    //     $bill = $this->model->find($id);

    //     $bill['customers'] = $bill->customer;
    //     $bill['branch'] = $bill->branch;
    //     // $bill['product'] = $bill->product;

    //     return $bill;
    // }
}