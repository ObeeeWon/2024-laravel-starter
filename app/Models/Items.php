<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    use SoftDeletes;

    protected $table = "items";
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function categories() {
        return $this->hasOne('App\Models\Categories', 'id', 'category_id');
    }}
