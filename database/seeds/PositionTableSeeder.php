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
        $pos1->name = "Nhân viên";
        $pos1->description = "Sai gì làm nấy";
        $pos1->save();
    }
}
