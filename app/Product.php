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

    protected  $fillable = ['code','title','name','cc_number','image','model_year','register_year','miles','color','origin','import_price','export_price','status','branch_id','brand_id','tag_id','category_id','staff_id'];

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

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function files()
    {
        return $this->hasMany(File::class,'product_id','id');
    }

}




