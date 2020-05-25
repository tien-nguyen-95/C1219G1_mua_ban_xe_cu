<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    protected $table = 'staffs';

    protected $fillable = ['name', 'user_id', 'gender', 'birthday' ,'phone' ,'image' ,'position_id', 'address' ,'branch_id'];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }


    public function guarantees()
    {
        return $this->hasMany(Guarantee::class, 'staff_id','id');
    }
    public function products() 
    {
        return $this->hasMany(Product::class,'staff_id','id');
    }
}
