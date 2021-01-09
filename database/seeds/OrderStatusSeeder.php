<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            [
                'status_name' => 'PENDING'
            ],
            [
                'status_name' => 'PROCESSING'
            ],
            [
                'status_name' => 'SHIPPED'
            ],
            [
                'status_name' => 'CANCELED'
            ],
            [
                'status_name' => 'COMPLETED'
            ]
        ]);
    }
}
