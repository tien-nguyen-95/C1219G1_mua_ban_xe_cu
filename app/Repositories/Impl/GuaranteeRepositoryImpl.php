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


}
