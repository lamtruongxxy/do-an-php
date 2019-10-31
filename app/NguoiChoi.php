<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiChoi extends Model
{
    protected $table = "nguoi_choi";

    protected $fillable = [
        "ten", "diem"
    ];
}
