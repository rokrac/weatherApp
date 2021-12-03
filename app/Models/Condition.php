<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsToMany('App\Models\Product', 'products_conditions', 'condition_id', 'product_id');
    }

    public function scopeByName($query,$name) {
        $query->where('name',$name);
    }
}
