<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guarantee;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Guarantee::class, function ($faker) use ($factory) {
    return [

        'customer_id' =>$factory->create(App\Customer::class)->id,
        // 'staff_id' =>$factory->create(App\Staff:class)->id,
        'product_id' =>$factory->create(App\Product::class)->id,
        // 'customer_id' => $faker->numberBetween(1,20),
        // 'staff_id' => $faker->numberBetween(1,20),
        // 'product_id' => $faker->numberBetween(1,20),
        'issue' => $faker->paragraph(2),
        'branch_id' =>$factory->create(App\Branch::class)->id,
        // 'branch_id' =>$faker->numberBetween(1,20),
        'date_in' => $faker->date,
        'date_out' => $faker->date
    ];
});
