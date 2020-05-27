<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable =['name', 'phone', 'email', 'address'];
    protected $dates = ['deleted_at'];


    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class);
    }
    public function bills(){
        return $this->hasMany(Bill::class, 'customer_id', 'id');
    }

}
