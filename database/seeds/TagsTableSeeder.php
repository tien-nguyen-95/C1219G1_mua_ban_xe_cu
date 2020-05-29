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
        $tag->name = 'tag';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'tag1';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'tag2';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'tag3';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'tag4';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'tag5';
        $tag->save();
    }
}
