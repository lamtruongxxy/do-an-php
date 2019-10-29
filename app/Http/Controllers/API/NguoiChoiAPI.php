<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiChoi;

class NguoiChoiAPI extends Controller
{
    public function ChiTietNguoiChoi($id)
    {
    		$nguoichoi = NguoiChoi::find($id);
    		return response()->json($nguoichoi, 200);
    }
    public function LayDSNguoiChoi()
    {
    	$dsNguoiChoi = NguoiChoi::all();
    	return response()->json($dsNguoiChoi, 200);
    }
}
