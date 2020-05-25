<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Nam',
            'user_id' => '1',
            'gender' => '1',
            'birthday' => '1995-02-18',
            'phone' => '012356789',
            'image' => null,
            'position_id' => '1',
            'address' => 'phong điền',
            'branch_id' => '1'
        ]);
        DB::table('staffs')->insert([
            'name' => 'Thuật',
            'user_id' => '1',
            'gender' => '1',
            'birthday' => '1996-07-13',
            'phone' => '012356459',
            'image' => null,
            'position_id' => '1',
            'address' => 'Huế',
            'branch_id' => '1'
        ]);
        DB::table('staffs')->insert([
            'name' => 'Tiến',
            'user_id' => '1',
            'gender' => '1',
            'birthday' => '1995-02-23',
            'phone' => '012352289',
            'image' => null,
            'position_id' => '1',
            'address' => 'Nam định',
            'branch_id' => '1'
        ]);
    }
}
