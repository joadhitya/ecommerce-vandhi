<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Aga Aulia',
                'username' => 'AAULIA',
                'email' => 'aga@gmail.com',
                'password' => 'agaaulia',
                'mobile' => '08737382931',
                'address' => 'Jogjakarta',
            ],
        ]);
    }
}
