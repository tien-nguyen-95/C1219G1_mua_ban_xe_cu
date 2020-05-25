<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            'customer_id' => 13,
            'product_id' => 2,
            'staff_id' => 1,
            'branch_id' => 1,
            'deposit' => 10000,
            'payment' => 100000,
            'status' => false,
            'complete' => true,
            'payment_at' => '2020-05-06',
            'delivered_at' => '2020-05-20'
        ]);

        DB::table('bills')->insert([
            'customer_id' => 14,
            'product_id' => 3,
            'staff_id' => 1,
            'branch_id' => 1,
            'deposit' => 10000,
            'payment' => 100000,
            'status' => false,
            'complete' => true,
            'payment_at' => '2020-05-06',
            'delivered_at' => '2020-05-20'
        ]);
    }
}
