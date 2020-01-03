<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LuotChoi;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(LuotChoi::class, function (Faker $faker) {
    $random = rand(-10, 10);
    return [
        'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
        'so_cau'    => rand(1, 20),
        'diem'  => rand(1, 100)
    ];
});
