<?php

use App\Branch;
use App\Customer;
use App\Product;
use App\Staff;
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
            'customer_id' => rand(1,Customer::count()),
            'product_id' => rand(1,Product::count()),
            'staff_id' => rand(1,Staff::count()),
            'branch_id' => rand(1,Branch::count()),
            'deposit' => 10000,
            'payment' => 100000,
            'status' => false,
            'complete' => true,
            'payment_at' => '2020-05-06',
            'delivered_at' => '2020-05-20'
        ]);

        DB::table('bills')->insert([
            'customer_id' => rand(1,Customer::count()),
            'product_id' => rand(1,Product::count()),
            'staff_id' => rand(1,Staff::count()),
            'branch_id' => rand(1,Branch::count()),
            'deposit' => 10000,
            'payment' => 100000,
            'status' => false,
            'complete' => true,
            'payment_at' => '2020-05-06',
            'delivered_at' => '2020-05-20'
        ]);
    }
}
