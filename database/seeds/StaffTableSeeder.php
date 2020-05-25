<?php

use App\Staff;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff1 = new Staff();
        $staff1->name = 'Chí phèo';
        $staff1->user_id = 1;
        $staff1->gender = 1;
        $staff1->birthday = '1995/12/09';
        $staff1->phone = '0912121314';
        $staff1->address = '1 Làng Vũ Đại';
        $staff1->branch_id = 1;
        $staff1->position_id = 1;
        $staff1->save();

        $staff2 = new Staff();
        $staff2->name = 'Thị nở';
        $staff2->user_id = 2;
        $staff2->gender = 0;
        $staff2->birthday = '1995/03/23';
        $staff2->phone = '0912121315';
        $staff2->address = '2 Làng Vũ Đại';
        $staff2->branch_id = 1;
        $staff2->position_id = 2;
        $staff2->save();

        $staff3 = new Staff();
        $staff3->name = 'Lão hạc';
        $staff3->user_id = 3;
        $staff3->gender = 1;
        $staff3->birthday = '1995/09/09';
        $staff3->phone = '0912121316';
        $staff3->address = 'Bùi thị xuân';
        $staff3->branch_id = 1;
        $staff3->position_id = 3;
        $staff3->save();

        $staff4 = new Staff();
        $staff4->name = 'Nam';
        $staff4->user_id = 4;
        $staff4->gender = 1;
        $staff4->birthday = '1995/12/12';
        $staff4->phone = '0912121317';
        $staff4->address = 'Phong Điền';
        $staff4->branch_id = 1;
        $staff4->position_id = 4;
        $staff4->save();
    }
}
