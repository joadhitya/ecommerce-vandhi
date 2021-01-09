<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id_category', 'id_subcategory', 'product_code', 'product_name', 'product_price', 'product_stock', 'product_recomended'];
}