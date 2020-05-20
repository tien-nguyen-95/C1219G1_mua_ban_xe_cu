<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $fillable =['name', 'phone', 'email', 'address'];
    protected $dates = ['deleted_at'];

    public function guarantees(){
        return $this->hasMany(Guarantee::class,'customer_id','id');
    }
}
