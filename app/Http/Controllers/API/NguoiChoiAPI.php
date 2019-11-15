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
				$res = [
					"success"	=> true,
					"data"		=> $nguoichoi
				];
    		return response()->json($res);
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
					"success"	=> true,
					"total"	=> NguoiChoi::count(),
					"data"	=> $listNguoiChoi
				];
    		return response()->json($res);
    }

    public function LayDSNguoiChoi()
    {
			$dsNguoiChoi = NguoiChoi::all();
			$res = [
				"success"	=> true,
				"data"		=> $dsNguoiChoi
			];
    	return response()->json($res);
    }
}
