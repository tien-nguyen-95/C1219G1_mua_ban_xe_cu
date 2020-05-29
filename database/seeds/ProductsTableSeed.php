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
        $product1->code='SCUB20';
        $product1->title ="Xe Số Super Cub 125 CC 2020";
        $product1->name ="Super Cub";
        $product1->cc_number =125;
        $product1->model_year = 2020;
        $product1->register_year = 2020;
        $product1->miles = 1000;
        $product1->color = "xanh";
        $product1->origin = "Nhật bản";
        $product1->import_price = 40000000;
        $product1->export_price = 50000000;
        $product1->status ="show";
        $product1->branch_id= 2;
        $product1->brand_id = 1;
        $product1->tag_id = 1;
        $product1->category_id=1;
        $product1->staff_id=2;
        $product1->save();

        $product1 = new Product();
        $product1->code='HFMD19';
        $product1->title ="Xe Số Honda Future 125cc Mâm Đĩa 2019";
        $product1->name ="Honda Future";
        $product1->cc_number =125;
        $product1->model_year = 2019;
        $product1->register_year = 2010;
        $product1->miles = 1000;
        $product1->color = "";
        $product1->origin = "Nhật bản";
        $product1->import_price = 15000000;
        $product1->export_price = 20000000;
        $product1->status ="show";
        $product1->branch_id= 2;
        $product1->brand_id = 1;
        $product1->tag_id = 2;
        $product1->category_id=1;
        $product1->staff_id=1;
        $product1->save();

        $product1 = new Product();
        $product1->code='SIFIRC';
        $product1->title ="Xe Số Yamaha Sirius FI RC Vành Đúc - sirius-fi-rc-011";
        $product1->name ="Yamaha Sirius FI RC";
        $product1->cc_number =115;
        $product1->model_year = 2015;
        $product1->register_year = 2015;
        $product1->miles = 10000;
        $product1->color = "Ghi";
        $product1->origin = "Nhật bản";
        $product1->import_price = 23000000;
        $product1->export_price = 30000000;
        $product1->status ="show";
        $product1->branch_id= 3;
        $product1->brand_id = 2;
        $product1->tag_id = 3;
        $product1->category_id=1;
        $product1->staff_id=2;
        $product1->save();

        $product1 = new Product();
        $product1->code='ABCBS';
        $product1->title ="Xe Tay Ga HONDA AIR BLADE 125CC Phanh CBS 2020";
        $product1->name ="AIR BLADE";
        $product1->cc_number =125;
        $product1->model_year = 2020;
        $product1->register_year = 2020;
        $product1->miles = 1000;
        $product1->color = "đen";
        $product1->origin = "nhật bản";
        $product1->import_price = 30000000;
        $product1->export_price = 38000000;
        $product1->status ="show";
        $product1->branch_id= 1;
        $product1->brand_id = 1;
        $product1->tag_id = 6;
        $product1->category_id=2;
        $product1->staff_id=1;
        $product1->save();

        $product1 = new Product();
        $product1->code='SHCBS';
        $product1->title ="Xe Máy Honda SH Mode 2019 Phiên Bản Thời Trang CBS";
        $product1->name ="Honda SH Mode";
        $product1->cc_number =125;
        $product1->model_year = 2019;
        $product1->register_year = 2019;
        $product1->miles = 2019;
        $product1->color = "Xám";
        $product1->origin = "Việt Nam";
        $product1->import_price = 40000000;
        $product1->export_price = 50000000;
        $product1->status ="show";
        $product1->branch_id= 1;
        $product1->brand_id = 1;
        $product1->tag_id = 6;
        $product1->category_id=2;
        $product1->staff_id=1;
        $product1->save();

        $product1 = new Product();
        $product1->code='YMHJS';
        $product1->title ="Xe Máy Yamaha Janus Standard bản tiêu chuẩn- Đen Bóng";
        $product1->name ="Yamaha Janus Standard";
        $product1->cc_number =125;
        $product1->model_year = 2018;
        $product1->register_year = 2018;
        $product1->miles = 3124;
        $product1->color = "Xám";
        $product1->origin = "Việt Nam";
        $product1->import_price = 15000000;
        $product1->export_price = 20000000;
        $product1->status ="show";
        $product1->branch_id= 2;
        $product1->brand_id = 2;
        $product1->tag_id = 6;
        $product1->category_id=2;
        $product1->staff_id=2;
        $product1->save();

        $product1 = new Product();
        $product1->code='KZX10';
        $product1->title ="KAWASAKI ZX10 - KZX1";
        $product1->name ="KAWASAKI ZX10 - KZX1";
        $product1->cc_number =998;
        $product1->model_year = 2018;
        $product1->register_year = 2018;
        $product1->miles = 171717;
        $product1->color = "Xanh Đen";
        $product1->origin = "Việt Nam";
        $product1->import_price = 350000000;
        $product1->export_price = 450000000;
        $product1->status ="show";
        $product1->branch_id= 2;
        $product1->brand_id = 4;
        $product1->tag_id = 6;
        $product1->category_id=4;
        $product1->staff_id=1;
        $product1->save();
    }
}
