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
        $tag->title = 'tag';
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag1';
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag2';
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag3';
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag4';
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag5';
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag6';
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag7';
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag8';
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag9';
        $tag->save();

        $tag = new Tag();
        $tag->title = 'tag10';
        $tag->save();
    }
}
