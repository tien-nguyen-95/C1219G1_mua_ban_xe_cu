<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            'name' => 'nguyễn văn a',
            'gender' => 1, //nam
            'birthday' => '2020-05-06',
            'phone' => '012345679',
            'image' => 'mnvbv.png',
            'account_id' => 1,
            'position_id' => 1,
            'address' => 'Hà Nội',
            'branch' => 1
        ]);

        
    }
}
