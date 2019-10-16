<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LuotChoi;
use Faker\Generator as Faker;

$factory->define(LuotChoi::class, function (Faker $faker) {
    return [
        'id_nguoi_choi' => 1,
    ];
});
