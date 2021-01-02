<?php

use Illuminate\Database\Seeder;
use App\Subcategory;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        Subcategory::create( [
            'subcategory_code' => 'LPJ',
            'subcategory_name' => 'Lengan Panjang',
            'id_category' => 1,
            'subcategory_description' => 'Lengan Panjang',
            'subcategory_slug' => 'lengan-panjang',
        ] );
        Subcategory::create( [
            'subcategory_code' => 'LPD',
            'subcategory_name' => 'Lengan Pendek',
            'id_category' => 1,
            'subcategory_description' => 'Lengan Pendek',
            'subcategory_slug' => 'lengan-pendek',
        ] );
        Subcategory::create( [
            'subcategory_code' => 'KMJ',
            'subcategory_name' => 'Kemeja',
            'id_category' => 1,
            'subcategory_description' => 'Kemeja',
            'subcategory_slug' => 'kemeja',
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
            'subcategory_code' => 'SLP',
            'subcategory_name' => 'Slip On',
            'id_category' => 3,
            'subcategory_description' => 'Slip On',
            'subcategory_slug' => 'slip-on',
        ] );
    }
}

