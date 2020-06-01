<?php

use App\File;
use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img = new File();
        $img->name = 'supercub1.jpg';
        $img->product_id = 1;
        $img->save();

        $img = new File();
        $img->name = 'supercub2.jpg';
        $img->product_id = 1;
        $img->save();

        $img = new File();
        $img->name = 'supercub3.jpg';
        $img->product_id = 1;
        $img->save();

        $img = new File();
        $img->name = 'supercub4.jpg';
        $img->product_id = 1;
        $img->save();

        $img = new File();
        $img->name = 'HFMD193.png';
        $img->product_id = 2;
        $img->save();

        $img = new File();
        $img->name = 'SIFIRC.jpg';
        $img->product_id = 3;
        $img->save();

        $img = new File();
        $img->name = 'SIFIRC1.jpg';
        $img->product_id = 3;
        $img->save();

        $img = new File();
        $img->name = 'SIFIRC2.jpg';
        $img->product_id = 3;
        $img->save();

        $img = new File();
        $img->name = 'ABCBS.jpg';
        $img->product_id = 4;
        $img->save();

        $img = new File();
        $img->name = 'ABCBS1.jpg';
        $img->product_id = 4;
        $img->save();

        $img = new File();
        $img->name = 'ABCBS2.jpg';
        $img->product_id = 4;
        $img->save();

        $img = new File();
        $img->name = 'ABCBS3.jpg';
        $img->product_id = 4;
        $img->save();

        $img = new File();
        $img->name = 'ABCBS4.jpg';
        $img->product_id = 4;
        $img->save();

        $img = new File();
        $img->name = 'SHCBS.png';
        $img->product_id = 5;
        $img->save();

        $img = new File();
        $img->name = 'YMHJS.png';
        $img->product_id = 6;
        $img->save();

        $img = new File();
        $img->name = 'YMHJS1.png';
        $img->product_id = 6;
        $img->save();

        $img = new File();
        $img->name = 'YMHJS2.png';
        $img->product_id = 6;
        $img->save();

        $img = new File();
        $img->name = 'YMHJS3.png';
        $img->product_id = 6;
        $img->save();

        $img = new File();
        $img->name = 'YMHJS4.png';
        $img->product_id = 6;
        $img->save();

        $img = new File();
        $img->name = 'KZX101.jpg';
        $img->product_id = 7;
        $img->save();

        $img = new File();
        $img->name = 'KZX10.jpg';
        $img->product_id = 7;
        $img->save();

        $img = new File();
        $img->name = 'KZX102.jpg';
        $img->product_id = 7;
        $img->save();
    }
}
