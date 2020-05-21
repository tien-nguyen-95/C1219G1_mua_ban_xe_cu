<?php

use Illuminate\Database\Seeder;

class GuaranteesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guarantees')->insert([
            'customer_id' => '1',
            'staff_id' => '4',
            'product_id' => '3',
            'issue' => 'Thay đèn',
            'branch_id' => '2',
            'date_in' => '2020-05-10',
            'date_out' => '2020-05-17'
        ]);
        DB::table('guarantees')->insert([
            'customer_id' => '2',
            'staff_id' => '2',
            'product_id' => '2',
            'issue' => 'Thay bánh xe',
            'branch_id' => '1',
            'date_in' => '2020-05-11',
            'date_out' => '2020-05-15'
        ]);
        DB::table('guarantees')->insert([
            'customer_id' => '3',
            'staff_id' => '4',
            'product_id' => '5',
            'issue' => 'Thay côn',
            'branch_id' => '3',
            'date_in' => '2020-05-13',
            'date_out' => '2020-05-20'
        ]);
    }
}

