<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['subcategory_code', 'subcategory_name', 'subcategory_description', 'subcategory_slug', 'id_category'];
}
