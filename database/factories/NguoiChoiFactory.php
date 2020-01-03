<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NguoiChoi;
use Faker\Generator as Faker;

$factory->define(NguoiChoi::class, function (Faker $faker) {
    return [
        'ten_dang_nhap' => $faker->name,
        'mat_khau'      => Hash::make('123456'),
        'email'         => $faker->email,
        'hinh_dai_dien' => 'avatar_temp.jpg',
        'diem_cao_nhat' => 90,
        'credit'        => 1000,
        'ho_ten'        => $faker->name,
    ];
});
