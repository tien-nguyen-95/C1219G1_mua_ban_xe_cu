<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new Brand();
        $brand->name = 'Honda';
        $brand->save();

        $brand = new Brand();
        $brand->name = 'Yamaha';
        $brand->save();

        $brand = new Brand();
        $brand->name = 'Suzuki';
        $brand->save();

        $brand = new Brand();
        $brand->name = 'Kawasaki';
        $brand->save();
    }
}
