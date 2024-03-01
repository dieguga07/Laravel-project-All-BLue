<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function products()
{
    return $this->belongsToMany(Products::class, 'product_category', 'category_id', 'product_id');
}
}