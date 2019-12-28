<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuenMatKhau extends Model
{
    use SoftDeletes;

    protected $table = "quen_mat_khau";

    protected $fillable = ['email', 'ma_xac_nhan', 'han_su_dung'];
}
