<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tag = new Tag();
        $tag->title = 'tag1';
        $tag->category_id = 1;
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag2';
        $tag->category_id = 2;
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag3';
        $tag->category_id = 2;
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag4';
        $tag->category_id = 3;
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag5';
        $tag->category_id = 3;
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag6';
        $tag->category_id = 4;
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag7';
        $tag->category_id = 4;
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag8';
        $tag->category_id = 5;
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag9';
        $tag->category_id = 5;
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag10';
        $tag->category_id = 1;
        $tag->save();
    }
}
