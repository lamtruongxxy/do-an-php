<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LinhVuc;
use Faker\Generator as Faker;

$factory->define(LinhVuc::class, function (Faker $faker) {
    return [
        "ten_linh_vuc"	=> $faker->name
    ];
});
