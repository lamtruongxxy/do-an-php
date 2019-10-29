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
		
    public function xepHang(Request $request)
    {
    		$page = $request->query("page", 1);
    		$limit = $request->query("limit", 25);
    		$listNguoiChoi = NguoiChoi::orderBy('diem_cao_nhat', 'desc')
    								->skip(($page - 1) * $limit)
    								->take($limit)
										->get();
				$res = [
					"total"	=> NguoiChoi::count(),
					"data"	=> $listNguoiChoi
				];
    		return response()->json($res, 200);
    }

    public function LayDSNguoiChoi()
    {
    	$dsNguoiChoi = NguoiChoi::all();
    	return response()->json($dsNguoiChoi, 200);
    }
}
