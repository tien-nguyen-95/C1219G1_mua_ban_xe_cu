<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Guarantee;

class Branch extends Model
{
    use SoftDeletes;

    protected $table = 'branches';

    protected $fillable = ['name','phone','address'];

    public function guarantees(){
        return $this->hasMany(Guarantee::class,'branch_id','id');
    }
}
