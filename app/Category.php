<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Tag;

class Category extends Model
{
    use SoftDeletes;
    
    protected $table = 'categories';

    protected $fillable =['name'];

    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class,'category_id','id');
    }
}
