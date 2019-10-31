<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CauHoi;

class CauHoiAPI extends Controller
{
    public function layDSCauHoi(Request $request)
    {
        $idLinhVuc = $request->query("linh_vuc", 1);
        $cauhoi = CauHoi::where('linh_vuc_id', $idLinhVuc)
                            ->get()
                            ->random(1)
                            ->first();
        $res = [
            "success" => true,
            "data"    => $cauhoi
        ];

        return \response()->json($res);
    }
}
