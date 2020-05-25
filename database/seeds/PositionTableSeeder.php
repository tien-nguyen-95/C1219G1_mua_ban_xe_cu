<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pos1 = new Position();
        $pos1->name = "Boss";
        $pos1->description = "Thích gì làm nấy";
        $pos1->save();

        $pos2 = new Position();
        $pos2->name = "Quản lý";
        $pos2->description = "Quản lý nhân viên, Có quyền xác nhận định giá sản phẩm, quản lý hóa đơn";
        $pos2->save();

        $pos3 = new Position();
        $pos3->name = "Nhân viên";
        $pos3->description = "Xác nhận định giá sản phẩm, quản lý hóa đơn";
        $pos3->save();

        $pos4 = new Position();
        $pos4->name = "Culi";
        $pos4->description = "Làm bảo dưỡng , nhận gửi xe";
        $pos4->save();
    }
}
