<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ChiTietLuotChoi;
use Faker\Generator as Faker;

$factory->define(ChiTietLuotChoi::class, function (Faker $faker) {
    return [
        'luot_choi_id'  => App\LuotChoi::pluck('id')->random(),
        'cau_hoi_id'    => App\CauHoi::pluck('id')->random(),
        'phuong_an'     => 'a',
        'diem'          => rand(1, 100)
    ];
});
