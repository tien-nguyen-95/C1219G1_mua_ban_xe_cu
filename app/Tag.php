<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','category','created_at'
    ];
    protected $date = ['delete_at'];

    public function products() 
    {
        return $this->hasMany(Product::class,'tag_id','id');
    }
}
