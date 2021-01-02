<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create( [
            'category_code' => 'BJ',
            'category_name' => 'Baju',
            'category_description' => 'Baju',
            'category_slug' => 'baju',
        ] );
        Category::create( [
            'category_code' => 'CL',
            'category_name' => 'Celana',
            'category_description' => 'Celana',
            'category_slug' => 'celana',
        ] );
        Category::create( [
            'category_code' => 'SD',
            'category_name' => 'Sandal',
            'category_description' => 'Sandal',
            'category_slug' => 'sandal',
        ] );
    }
}