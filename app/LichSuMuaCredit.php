<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichSuMuaCredit extends Model
{
    protected $table = 'lich_su_mua_credit';
    protected $fillable = ['id_nguoi_choi', 'id_goi_credit', 'credit', 'so_tien'];
}
