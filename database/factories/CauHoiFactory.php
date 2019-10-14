<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CauHoi;
use Faker\Generator as Faker;

$factory->define(CauHoi::class, function (Faker $faker) {
	$dap_an = ['a', 'b', 'c', 'd'];
    return [
        'noi_dung'	=> $faker->sentence(),
        'linh_vuc_id'	=> App\LinhVuc::pluck('id')->random(),
        'phuong_an_a'	=> $faker->sentence(),
        'phuong_an_b'	=> $faker->sentence(),
        'phuong_an_c'	=> $faker->sentence(),
        'phuong_an_d'	=> $faker->sentence(),
        'dap_an'	=> $dap_an[array_rand($dap_an)]
    ];
});
