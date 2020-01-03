<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LichSuMuaCredit;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(LichSuMuaCredit::class, function (Faker $faker) {
    $random = rand(-10, 10);
    return [
        'nguoi_choi_id' => App\NguoiChoi::pluck('id')->random(),
        'goi_credit_id' => App\GoiCredit::pluck('id')->random(),
        'trang_thai'    => rand(0, 1)
    ];
});
