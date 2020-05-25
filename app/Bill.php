<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;
    protected $fillable =['customer_id', 'product_id', 'staff_id', 'branch_id', 'deposit', 'payment',
                            'status', 'complete', 'payment_at', 'delivered_at'];
    // protected $dates = ['deleted_at'];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function branch(){

        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }  

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
