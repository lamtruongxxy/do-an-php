<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietLuotChoi extends Model
{
    protected $table = 'chi_tiet_luot_choi';
    protected $fillable = ['luot_choi_id', 'cau_hoi_id', 'phuong_an', 'diem'];
}
