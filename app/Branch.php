<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $table = 'branches';

    protected $fillable = ['name','phone','address'];

    public function products(){
        return $this->hasMany(Product::class,'branch_id','id');
    }
}
