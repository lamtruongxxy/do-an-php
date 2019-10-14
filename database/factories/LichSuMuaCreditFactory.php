<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LichSuMuaCredit;
use Faker\Generator as Faker;

$factory->define(LichSuMuaCredit::class, function (Faker $faker) {
    return [
        'id_nguoi_choi' => App\NguoiChoi::pluck('id')->random(),
        'id_goi_credit' => App\GoiCredit::pluck('id')->random(),
        'credit'        => App\GoiCredit::pluck('credit')->random(),
        'so_tien'       => App\GoiCredit::pluck('so_tien')->random()
    ];
});
