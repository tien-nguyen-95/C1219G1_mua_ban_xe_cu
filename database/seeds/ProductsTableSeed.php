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
        $product1->cc_number =150;
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

        $product1 = new Product();
        $product1->code='2';
        $product1->title ="Exciter còn mới ";
        $product1->name ="Exciter 150 FI";
        $product1->cc_number =150;
        $product1->model_year = 2020;
        $product1->register_year = 2020;
        $product1->miles = 1000;
        $product1->color = "xanh";
        $product1->origin = "nhật bản";
        $product1->import_price = 45000000;
        $product1->export_price = 50000000;
        $product1->status ="show";
        $product1->branch_id= 2;
        $product1->brand_id = 2;
        $product1->tag_id = 2;
        $product1->category_id=2;
        $product1->staff_id=2;
        $product1->save();

        $product1 = new Product();
        $product1->code='3';
        $product1->title ="sirius còn mới ";
        $product1->name ="dream 115 FI";
        $product1->cc_number =115;
        $product1->model_year = 2020;
        $product1->register_year = 2020;
        $product1->miles = 1000;
        $product1->color = "đen";
        $product1->origin = "nhật bản";
        $product1->import_price = 23000000;
        $product1->export_price = 30000000;
        $product1->status ="show";
        $product1->branch_id= 3;
        $product1->brand_id = 3;
        $product1->tag_id = 3;
        $product1->category_id=3;
        $product1->staff_id=3;
        $product1->save();
    }
}
