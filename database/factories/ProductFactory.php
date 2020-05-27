<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Branch;
use App\Brand;
use App\Category;
use App\Product;
use App\Staff;
use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code' => Str::random(6),
        'title' => $faker->firstName,
        'name' => $faker->name,
        'model_year' => $faker->randomNumber(4),
        'register_year' => $faker->randomNumber(4),
        'miles' =>  $faker->randomNumber(4),
        'color' => $faker->colorName,
        'origin' =>$faker->country,
        'import_price' => $faker->randomNumber(8),
        'export_price' => $faker->randomNumber(8),
        'status' => 'show',
        'branch_id' => random_int(1,Branch::count()),
        'brand_id'=> random_int(1,Brand::count()),
        'tag_id'=> random_int(1,Tag::count()),
        'category_id'=> random_int(1,Category::count()),
        'staff_id'=> random_int(1,Staff::count()),
    ];
});
