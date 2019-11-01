<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiChoi;

class NguoiChoiAPI extends Controller
{
    public function layDSXepHang(Request $request)
    {
        $currentPage = $request->query('page', 1);
        $take = $request->query('limit', 25);
        $skip = ($currentPage - 1);
        $db = NguoiChoi::orderBy('diem', 'desc')
                            ->take($take)
                            ->skip($skip)
                            ->get();
        $res = [
            "success"   => true,
            "data"      => $db
        ];
        return \response()->json($res);
    }
}
