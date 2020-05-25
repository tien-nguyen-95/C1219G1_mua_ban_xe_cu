<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $casts = ['image'=>'array', ];

    protected  $fillable = ['code','name','image','category_id','brand_id','tag_id','model_year','import_price','export_price','branch_id','status','staff_id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function guarantees()
    {
        return $this->hasMany(Guarantee::class,'product_id','id');
    }

}




