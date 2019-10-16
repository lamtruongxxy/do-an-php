<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ChiTietLuotChoi;
use Faker\Generator as Faker;

$factory->define(ChiTietLuotChoi::class, function (Faker $faker) {
    return [
        'id_luot_choi'  => App\LuotChoi::pluck('id')->random(),
        'id_cau_hoi'    => App\CauHoi::pluck('id')->random(),
        'phuong_an'     => 'a',
        'diem'          => rand(1, 100)
    ];
});
