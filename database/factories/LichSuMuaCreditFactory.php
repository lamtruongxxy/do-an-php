<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LichSuMuaCredit;
use Faker\Generator as Faker;

$factory->define(LichSuMuaCredit::class, function (Faker $faker) {
    return [
        'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
        'goi_credit_id' => App\GoiCredit::pluck('id')->random(),
        'credit'        => App\GoiCredit::pluck('credit')->random(),
        'so_tien'       => App\GoiCredit::pluck('so_tien')->random()
    ];
});
