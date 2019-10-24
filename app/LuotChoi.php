<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuotChoi extends Model
{
    protected $table = 'luot_choi';
    protected $fillable = ['nguoi_choi_id', 'so_cau', 'diem'];

    public function cauHoi()
    {
        return $this->belongsToMany('App\CauHoi', 'chi_tiet_luot_choi');
    }

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }
}
