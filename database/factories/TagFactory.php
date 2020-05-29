<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;
use phpDocumentor\Reflection\Types\Nullable;
use App\Category;
$factory->define(Tag::class, function ($faker) use ($factory) {
    return [
        'title' => $faker->title,
        'category_id' =>random_int(1,Category::count()),
    ];
});
