<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NguoiChoi;
use Faker\Generator as Faker;

$factory->define(NguoiChoi::class, function (Faker $faker) {
    return [
        "ten"   => $faker->name,
        "diem"  => rand(100, 10000)
    ];
});
