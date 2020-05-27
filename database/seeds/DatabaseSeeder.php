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
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(BrandsTableSeeder::class);

        // $this->call(TagsTableSeeder::class);
        // $this->call(CustomerTableSeeder::class);

        $this->call(BranchTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PositionTableSeeder::class);

        $this->call(StaffTableSeeder::class);
        $this->call(ProductsTableSeed::class);
        $this->call(GuaranteesTableSeeder::class);

        $this->call(BillTableSeeder::class);
    }
}
