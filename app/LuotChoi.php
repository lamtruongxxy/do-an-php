<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuotChoi extends Model
{
    protected $table = 'luot_choi';
    protected $fillable = ['id_nguoi_choi'];

    public function cauHoi()
    {
        return $this->belongsToMany('App\CauHoi', 'chi_tiet_luot_choi');
    }
}
