<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Guarantee extends Model
{
    use SoftDeletes;

    protected $table ="guarantees";

    protected $fillable = ['customer_id','staff_id','product_id','issue','branch_id','date_in','date_out'];

    protected $date = ['delete_at'];


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id','id');
    }

}
