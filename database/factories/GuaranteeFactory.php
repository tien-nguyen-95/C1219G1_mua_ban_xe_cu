<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guarantee;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Guarantee::class, function ($faker) use ($factory) {
    return [
        'issue' => $faker->paragraph(5),
        'customer_id' =>$factory->create(App\Customer::class)->id,
        // 'staff_id' =>$factory->create(App\Staff:class)->id,
        // 'product_id' =>$factory->create(App\Product::class)->id,
        'branch_id' =>$factory->create(App\Branch::class)->id,
        'date_in' => $faker->date,
        'date_out' => $faker->date
    ];
});
