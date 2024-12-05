<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    protected $table = "categories";
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function items() {
        return $this->hasMany('App\Models\Items', 'category_id');
    }
}
