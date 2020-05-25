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
            'image' => '1111111111',
            'model_year'=>'2000',
            'import_price' => '10000000',
            'export_price' => '11000000',
            'status' => '1',
            'branch_id'=>'1',
            'brand_id'=> '1',
            'tag_id' => '2',
            'category_id' =>'3',
            'staff_id' => '2'

        ]);
        DB::table('products')->insert([
            'code' => 'xd002',
            'name' => 'Xe đạp 02',
            'image' => '2222222',
            'model_year'=>'2001',
            'import_price' => '10000000',
            'export_price' => '12000000',
            'status' => '1',
            'branch_id'=>'1',
            'brand_id'=> '1',
            'tag_id' => '2',
            'category_id' =>'3',
            'staff_id' => '2'

        ]);
        DB::table('products')->insert([
            'code' => 'xd003',
            'name' => 'Xe đạp 03',
            'image' => '333333333333',
            'model_year'=>'2003',
            'import_price' => '10000000',
            'export_price' => '13000000',
            'status' => '1',
            'branch_id'=>'1',
            'brand_id'=> '1',
            'tag_id' => '2',
            'category_id' =>'3',
            'staff_id' => '2'

        ]);
    }
}
