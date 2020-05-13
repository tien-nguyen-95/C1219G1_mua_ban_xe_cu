<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomerTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);

        //$this->call(BrandsTableSeeder::class);
        //$this->call(TagsTableSeeder::class);

        // $this->call(BrandsTableSeeder::class);
        // $this->call(TagsTableSeeder::class);

    }
}
