<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CauHoi extends Model
{
	use SoftDeletes;
    protected $table = 'cau_hoi';
    protected $fillable = [
    	'noi_dung', 'linh_vuc_id', 'phuong_an_a', 'phuong_an_b', 'phuong_an_c', 'phuong_an_d', 'dap_an'
    ];

    public function luotChoi()
    {
        return $this->belongsToMany('App\LuotChoi', 'chi_tiet_luot_choi');
    }

    public function linhVuc()
    {
    	return $this->belongsTo('App\LinhVuc');
    }
}
