<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function conditions(){
        return $this->belongsToMany('App\Models\Condition', 'products_conditions', 'product_id', 'condition_id');
    }
}
