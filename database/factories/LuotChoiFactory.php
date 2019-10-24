<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LuotChoi;
use Faker\Generator as Faker;

$factory->define(LuotChoi::class, function (Faker $faker) {
    return [
        'nguoi_choi_id' => 1,
        'so_cau'    => rand(1, 20),
        'diem'  => rand(1, 100),
    ];
});
