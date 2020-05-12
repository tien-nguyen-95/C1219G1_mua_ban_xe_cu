<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;
use phpDocumentor\Reflection\Types\Nullable;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName,
        'category'=>$faker->colorName,
    ];
});
