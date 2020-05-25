<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Le Cuong',
            'phone' => '123012545',
            'email' => 'cuong@gamil.com',
            'address' => 'tp.HCM'
        ]);
        DB::table('customers')->insert([
            'name' => 'Tran Tam',
            'phone' => '12365479',
            'email' => 'Tamg@gamil.com',
            'address' => 'tp.Vinh'
        ]);
        DB::table('customers')->insert([
            'name' => 'Nguyen Nam',
            'phone' => '123555479',
            'email' => 'Nam@gamil.com',
            'address' => 'tp.Hue'
        ]);
    }
}
