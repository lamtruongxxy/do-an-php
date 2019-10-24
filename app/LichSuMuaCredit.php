<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichSuMuaCredit extends Model
{
    protected $table = 'lich_su_mua_credit';
    protected $fillable = ['nguoi_choi_id', 'goi_credit_id', 'credit', 'so_tien'];
    
    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }

    public function nguoiChoi()
    {
        return $this->belongsTo("App\NguoiChoi");
    }

    public function goiCredit()
    {
        return $this->belongsTo("App\GoiCredit");
    }
}
