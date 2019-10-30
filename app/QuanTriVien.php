<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class QuanTriVien extends Authenticatable
{
	use SoftDeletes;


    protected $table='quan_tri_vien';


    protected $fillable=[
    	'ten_dang_nhap','mat_khau','ho_ten'
    ];

    protected $hidden=[
    	'mat_khau'

    ];

    public function getAuthPassword()
    {
    	return $this->mat_khau;
    }
}
