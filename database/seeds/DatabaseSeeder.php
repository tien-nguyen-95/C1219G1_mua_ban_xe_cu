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
        // $this->call(UserSeeder::class);
        $this->call(CategoriesTableSeeder::class);
<<<<<<< HEAD
        // $this->call(BrandsTableSeeder::class);
        //$this->call(TagsTableSeeder::class);
=======
        $this->call(BrandsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
>>>>>>> e147374cf497f5fabec3ec8b5e6ec7a3c6a6510d
    }
}
