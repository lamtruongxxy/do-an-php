<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietLuotChoi extends Model
{
    protected $table = 'chi_tiet_luot_choi';
    protected $fillable = ['id_luot_choi', 'id_cau_hoi', 'phuong_an', 'diem'];
}
