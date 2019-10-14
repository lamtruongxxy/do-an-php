<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NguoiChoi extends Model
{
    use SoftDeletes;
    protected $table = 'nguoi_choi';
    protected $fillable = ['ten_dang_nhap', 'mat_khau', 'email', 'hinh_dai_dien', 'diem_cao_nhat', 'credit'];
    protected $hidden = ['mat_khau'];
}
