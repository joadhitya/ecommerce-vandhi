<?php

use Illuminate\Database\Seeder;
use App\Subcategory;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        Subcategory::create( [
            'subcategory_code' => 'KS',
            'subcategory_name' => 'Kaos',
            'id_category' => 1,
            'subcategory_description' => 'Kaos',
            'subcategory_slug' => 'kaos',
        ] );
        Subcategory::create( [
            'subcategory_code' => 'KMJ',
            'subcategory_name' => 'Kemeja',
            'id_category' => 1,
            'subcategory_description' => 'Kemeja',
            'subcategory_slug' => 'kemeja',
        ] );
        Subcategory::create( [
            'subcategory_code' => 'JS',
            'subcategory_name' => 'Jas',
            'id_category' => 1,
            'subcategory_description' => 'Jas',
            'subcategory_slug' => 'jas',
        ] );
        Subcategory::create( [
            'subcategory_code' => 'JNS',
            'subcategory_name' => 'Jeans',
            'id_category' => 2,
            'subcategory_description' => 'Jeans',
            'subcategory_slug' => 'jeans',
        ] );
        Subcategory::create( [
            'subcategory_code' => 'BXR',
            'subcategory_name' => 'Boxer',
            'id_category' => 2,
            'subcategory_description' => 'Boxer',
            'subcategory_slug' => 'boxer',
        ] );
        Subcategory::create( [
            'subcategory_code' => 'CHN',
            'subcategory_name' => 'Chino',
            'id_category' => 2,
            'subcategory_description' => 'Chino',
            'subcategory_slug' => 'chino',
        ] );
        Subcategory::create( [
            'subcategory_code' => 'SLP',
            'subcategory_name' => 'Slip On',
            'id_category' => 3,
            'subcategory_description' => 'Slip On',
            'subcategory_slug' => 'slip-on',
        ] );
        Subcategory::create( [
            'subcategory_code' => 'SLP',
            'subcategory_name' => 'Casual Sandal',
            'id_category' => 3,
            'subcategory_description' => 'Casual Sandal',
            'subcategory_slug' => 'casual-sandal',
        ] );
        Subcategory::create( [
            'subcategory_code' => 'WMS',
            'subcategory_name' => 'Woman Sandal',
            'id_category' => 3,
            'subcategory_description' => 'Woman Sandal',
            'subcategory_slug' => 'Woman Sandal',
        ] );
    }
}

