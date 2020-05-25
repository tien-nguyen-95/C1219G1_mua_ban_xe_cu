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
        $this->call(BranchTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(StaffsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(GuaranteesTableSeeder::class);
    }
}
