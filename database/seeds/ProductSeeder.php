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
            'product_code' => 'T-RMR',
            'product_name' => 'Tees Red Maroon',
            'product_price' => 100000,
            'product_stock' => 9,
            'product_recomended' => 1,
            'product_description' => 'Tees Red Maroon',
            'product_slug' => 'tees-red-maroon',
            'product_image' => 'assets/product_image/01.jpg'
        ] );
        Product::create( [
            'id_category' => 2,
            'id_subcategory' => 4,
            'product_code' => 'W-JNS',
            'product_name' => 'Woman Jeans Stripped',
            'product_price' => 230000,
            'product_stock' => 14,
            'product_recomended' => 0,
            'product_description' => 'Woman Jeans Stripped',
            'product_slug' => 'woman-jeans-stripped',
            'product_image' => 'assets/product_image/02.jpg'
        ] );
        Product::create( [
            'id_category' => 2,
            'id_subcategory' => 4,
            'product_code' => 'M-JNS',
            'product_name' => 'Man Jeans',
            'product_price' => 270000,
            'product_stock' => 29,
            'product_recomended' => 0,
            'product_description' => 'Man Jeans',
            'product_slug' => 'man-jeans',
            'product_image' => 'assets/product_image/03.jpg'
        ] );
        Product::create( [
            'id_category' => 2,
            'id_subcategory' => 4,
            'product_code' => 'W-NJN',
            'product_name' => 'Woman Jeans',
            'product_price' => 200000,
            'product_stock' => 5,
            'product_recomended' => 1,
            'product_description' => 'Woamn Jeans',
            'product_slug' => 'woman-jeans',
            'product_image' => 'assets/product_image/04.jpg'
        ] );
        Product::create( [
            'id_category' => 3,
            'id_subcategory' => 8,
            'product_code' => 'S-BCS',
            'product_name' => 'Black Casual Sandals',
            'product_price' => 175000,
            'product_stock' => 22,
            'product_recomended' => 0,
            'product_description' => 'Black Casual Sandals',
            'product_slug' => 'black-casual-sandals',
            'product_image' => 'assets/product_image/05.jpg'
        ] );
        Product::create( [
            'id_category' => 1,
            'id_subcategory' => 2,
            'product_code' => 'F-RED',
            'product_name' => 'Red Flannel Checkboard',
            'product_price' => 320000,
            'product_stock' => 17,
            'product_recomended' => 1,
            'product_description' => 'Red Flannel Checkboard',
            'product_slug' => 'red-flannel-checkboard',
            'product_image' => 'assets/product_image/06.jpg'
        ] );
        Product::create( [
            'id_category' => 3,
            'id_subcategory' => 9,
            'product_code' => 'W-SND',
            'product_name' => 'Slim Woman Sandal',
            'product_price' => 420000,
            'product_stock' => 11,
            'product_recomended' => 1,
            'product_description' => 'Slim Woman Sandal',
            'product_slug' => 'slim-woman-sandal',
            'product_image' => 'assets/product_image/07.jpg'
        ] );
        Product::create( [
            'id_category' => 1,
            'id_subcategory' => 1,
            'product_code' => 'T-BLU',
            'product_name' => 'Tees Blue Indigo',
            'product_price' => 100000,
            'product_stock' => 19,
            'product_recomended' => 0,
            'product_description' => 'Tees Blue Indigo',
            'product_slug' => 'tees-blue-indigo',
            'product_image' => 'assets/product_image/08.jpg'
        ] );
        Product::create( [
            'id_category' => 2,
            'id_subcategory' => 6,
            'product_code' => 'W-CNH',
            'product_name' => 'Woman Chino Tosca',
            'product_price' => 190000,
            'product_stock' => 6,
            'product_recomended' => 1,
            'product_description' => 'Woman Chino Tosca',
            'product_slug' => 'woman-chino-tosca',
            'product_image' => 'assets/product_image/09.jpg'
        ] );
        Product::create( [
            'id_category' => 1,
            'id_subcategory' => 2,
            'product_code' => 'W-CSS',
            'product_name' => 'White Casual Shirt',
            'product_price' => 380000,
            'product_stock' => 10,
            'product_recomended' => 1,
            'product_description' => 'White Casual Shirt',
            'product_slug' => 'white-casual-shirt',
            'product_image' => 'assets/product_image/10.jpg'
        ] );
        Product::create( [
            'id_category' => 3,
            'id_subcategory' => 8,
            'product_code' => 'M-CSN',
            'product_name' => 'Man Casual Sandals',
            'product_price' => 220000,
            'product_stock' => 27,
            'product_recomended' => 0,
            'product_description' => 'Man Casual Sandals',
            'product_slug' => 'man-casual-sandals',
            'product_image' => 'assets/product_image/11.jpg'
        ] );
        Product::create( [
            'id_category' => 3,
            'id_subcategory' => 7,
            'product_code' => 'S-ONB',
            'product_name' => 'Slip On Black Stripped',
            'product_price' => 120000,
            'product_stock' => 14,
            'product_recomended' => 0,
            'product_description' => 'Slip On Black Stripped',
            'product_slug' => 'slip-on-black-stripped',
            'product_image' => 'assets/product_image/12.jpg'
        ] );
        Product::create( [
            'id_category' => 2,
            'id_subcategory' => 4,
            'product_code' => 'B-JNS',
            'product_name' => 'Black Jeans Man',
            'product_price' => 290000,
            'product_stock' => 25,
            'product_recomended' => 1,
            'product_description' => 'Black Jeans Man',
            'product_slug' => 'black-jeans-man',
            'product_image' => 'assets/product_image/13.jpg'
        ] );
        Product::create( [
            'id_category' => 1,
            'id_subcategory' => 1,
            'product_code' => 'T-RED',
            'product_name' => 'Red Casual Tees',
            'product_price' => 80000,
            'product_stock' => 33,
            'product_recomended' => 1,
            'product_description' => 'Red Casual Tees',
            'product_slug' => 'red-casual-tees',
            'product_image' => 'assets/product_image/14.jpg'
        ] );
        Product::create( [
            'id_category' => 2,
            'id_subcategory' => 6,
            'product_code' => 'B-CHN',
            'product_name' => 'Black Chino Man',
            'product_price' => 170000,
            'product_stock' => 18,
            'product_recomended' => 0,
            'product_description' => 'Black Chino Man',
            'product_slug' => 'black-chino-man',
            'product_image' => 'assets/product_image/15.jpg'
        ] );
        Product::create( [
            'id_category' => 2,
            'id_subcategory' => 6,
            'product_code' => 'G-CHN',
            'product_name' => 'Gray Chino Man',
            'product_price' => 170000,
            'product_stock' => 18,
            'product_recomended' => 0,
            'product_description' => 'Gray Chino Man',
            'product_slug' => 'gray-chino-man',
            'product_image' => 'assets/product_image/16.jpg'
        ] );
        Product::create( [
            'id_category' => 2,
            'id_subcategory' => 6,
            'product_code' => 'B-MCH',
            'product_name' => 'Blue Chino Man',
            'product_price' => 170000,
            'product_stock' => 20,
            'product_recomended' => 0,
            'product_description' => 'Blue Chino Man',
            'product_slug' => 'blue-chino-man',
            'product_image' => 'assets/product_image/17.jpg'
        ] );
        Product::create( [
            'id_category' => 2,
            'id_subcategory' => 6,
            'product_code' => 'R-MCH',
            'product_name' => 'Red Chino Man',
            'product_price' => 170000,
            'product_stock' => 15,
            'product_recomended' => 1,
            'product_description' => 'Red Chino Man',
            'product_slug' => 'red-chino-man',
            'product_image' => 'assets/product_image/18.jpg'
        ] );
        Product::create( [
            'id_category' => 1,
            'id_subcategory' => 2,
            'product_code' => 'M-MSS',
            'product_name' => 'Motif Shirt Man',
            'product_price' => 195000,
            'product_stock' => 12,
            'product_recomended' => 1,
            'product_description' => 'Motif Shirt Man',
            'product_slug' => 'motif-shirt-man',
            'product_image' => 'assets/product_image/19.jpg'
        ] );
        Product::create( [
            'id_category' => 2,
            'id_subcategory' => 5,
            'product_code' => 'S-BXR',
            'product_name' => 'Skull Boxer',
            'product_price' => 135000,
            'product_stock' => 10,
            'product_recomended' => 0,
            'product_description' => 'Skull Boxer',
            'product_slug' => 'skull-boxer',
            'product_image' => 'assets/product_image/20.jpg'
        ] );
    }
}

