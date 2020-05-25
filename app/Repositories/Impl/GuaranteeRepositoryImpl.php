<?php
namespace App\Repositories\Impl;

use App\Guarantee;
use App\Repositories\GuaranteeRepository;
use App\Repositories\Eloquent\EloquentRepository;

class GuaranteeRepositoryImpl extends EloquentRepository  implements GuaranteeRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Guarantee::class;
        return $model;
    }

    public function getAllForeign()
    {

        $result = $this->model->all();

        foreach($result as $data){

            $result->customer_name = $data->customer->name;
            $result->branch_name = $data->branch->name;
            $result->staff_name = $data->staff->name;
            $result->product_name = $data->product->name;
        }
        return $result;
    }

    public function getByIdForeign($id)
    {
        $result = $this->model->find($id);
        $result['customer']=$result->customer->name;
        $result['branch'] = $result->branch->name;
        $result['staff'] = $result->staff->name;
        $result['product'] =$result->product->name;

        return $result;
    }
}
