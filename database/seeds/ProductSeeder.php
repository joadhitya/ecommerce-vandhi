<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // BAJU
        Product::create( [
            'id_category' => 1,
            'id_subcategory' => 1,
            'product_code' => 'LP-CHMP',
            'product_name' => 'Champion Long Sleeve',
            'product_price' => 250000,
            'product_stock' => 9,
            'product_recomended' => 1,
            'product_description' => 'Champion Long Sleeve',
            'product_slug' => 'champion-long-sleeve',
            'product_image' => 'assets/product_image/P01.png'
        ] );
        Product::create( [
            'id_category' => 1,
            'id_subcategory' => 1,
            'product_code' => 'LP-VANS',
            'product_name' => 'Vans Long Sleeve',
            'product_price' => 300000,
            'product_stock' => 4,
            'product_recomended' => 0,
            'product_description' => 'Vans Long Sleeve',
            'product_slug' => 'vans-long-sleeve',
            'product_image' => 'assets/product_image/P02.png'
        ] );
        Product::create( [
            'id_category' => 1,
            'id_subcategory' => 2,
            'product_code' => 'LD-CHMP',
            'product_name' => 'Champion Tees',
            'product_price' => 150000,
            'product_stock' => 12,
            'product_recomended' => 1,
            'product_description' => 'Champion Tees',
            'product_slug' => 'champion-tees',
            'product_image' => 'assets/product_image/P03.png'
        ] );
        Product::create( [
            'id_category' => 1,
            'id_subcategory' => 3,
            'product_code' => 'KM-HNM',
            'product_name' => 'H&M Shirt',
            'product_price' => 550000,
            'product_stock' => 2,
            'product_recomended' => 1,
            'product_description' => 'H&M Shirt',
            'product_slug' => 'h&m-shirt',
            'product_image' => 'assets/product_image/P04.png'
        ] );
    }
}

