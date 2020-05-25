<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected  $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
