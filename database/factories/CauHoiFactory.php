<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CauHoi;
use Faker\Generator as Faker;

$factory->define(CauHoi::class, function (Faker $faker) {
    return [
        "cau_hoi"   => $faker->name,
        "phuong_an_a"   => $faker->sentence(),
        "phuong_an_b"   => $faker->sentence(),
        "phuong_an_c"   => $faker->sentence(),
        "phuong_an_d"   => $faker->sentence(),
        "dap_an"        => 'a',
        "linh_vuc_id"   => App\LinhVuc::pluck("id")->random()
    ];
});
