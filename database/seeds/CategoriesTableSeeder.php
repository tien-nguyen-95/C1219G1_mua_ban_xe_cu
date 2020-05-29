<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Xe số';
        $category->save();

        $category = new Category();
        $category->name = 'Xe ga';
        $category->save();

        $category = new Category();
        $category->name = 'Xe côn';
        $category->save();

        $category = new Category();
        $category->name = 'Xe phân khối lớn';
        $category->save();

        $category = new Category();
        $category->name = 'Xe độ';
        $category->save();
    }
}
