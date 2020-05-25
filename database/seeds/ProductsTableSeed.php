<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = new Product();
        $product1->code='1';
        $product1->title ="raider còn mới ";
        $product1->name ="RAIDER 150 FI";
        $product1->image ='';
        $product1->model_year = 2000;
        $product1->register_year = 2001;
        $product1->miles = 10000;
        $product1->color = "xanh";
        $product1->origin = "nhật bản";
        $product1->import_price = 40000000;
        $product1->export_price = 50000000;
        $product1->status ="show";
        $product1->branch_id= 1;
        $product1->brand_id = 1;
        $product1->tag_id = 1;
        $product1->category_id=1;
        $product1->staff_id=1;
        $product1->save();
    }
}
