<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiChoi;

class NguoiChoiAPI extends Controller
{
    public function layDSXepHang()
    {
        $db = NguoiChoi::orderBy('diem', 'desc')->limit(25)->get();
        $res = [
            "success"   => true,
            "data"      => $db
        ];
        return \response()->json($res);
    }
}
