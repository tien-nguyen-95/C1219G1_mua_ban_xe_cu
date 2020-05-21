<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'code' => 'xd001',
            'name' => 'Xe đạp 01',
            'image' => null,
            'category_id' => '',
            'phone' => '012356789',
            'image' => null,
            'position_id' => '1',
            'address' => 'phong điền',
            'branch_id' => '2'
        ]);
    }
}
