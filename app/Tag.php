<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;

class Tag extends Model
{
    use SoftDeletes;
    
    protected $table ="tags";
    
    protected $fillable = ['title','category_id'];

    protected $date = ['delete_at'];
  

    public function products() 
    {
        return $this->hasMany(Product::class,'tag_id','id');
    }
   

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
