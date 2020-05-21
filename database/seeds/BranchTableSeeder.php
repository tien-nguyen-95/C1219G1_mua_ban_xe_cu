<?php

use App\Branch;
use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branch1 = new Branch();
        $branch1->name = 'Chi nhánh Huế';
        $branch1->phone = '0111222333';
        $branch1->address = '28 Nguyễn Tri Phương';
        $branch1->save();

        $branch2 = new Branch();
        $branch2->name = 'Chi nhánh Hà nội';
        $branch2->phone = '0111222334';
        $branch2->address = '28 Tri Phương Nguyễn ';
        $branch2->save();

        $branch3 = new Branch();
        $branch3->name = 'Chi nhánh TP.HCM';
        $branch3->phone = '0111222345';
        $branch3->address = '28 Phương Nguyễn Tri ';
        $branch3->save();
    }
}
