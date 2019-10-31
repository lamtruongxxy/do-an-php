<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    protected $table = "cau_hoi";
    protected $fillable = [
        "cau_hoi", "phuong_an_a", "phuong_an_b", "phuong_an_c", "phuong_an_d", "dap_an", "linh_vuc_id"
    ];
}
