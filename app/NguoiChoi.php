<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
// Please add this line
use Tymon\JWTAuth\Contracts\JWTSubject;

class NguoiChoi extends Authenticatable implements JWTSubject
{
    use SoftDeletes;
    protected $table = 'nguoi_choi';

    protected $fillable = [
        'ten_dang_nhap', 
        'mat_khau', 
        'email', 
        'hinh_dai_dien', 
        'diem_cao_nhat', 
        'credit'
    ];

    protected $hidden = ['mat_khau'];

    public function getAuthPassword()
    {
    	return $this->mat_khau;
    }
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims()
    {
        return [];
    }
}
