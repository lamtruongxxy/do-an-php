<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CauHoi;

class CauHoiAPI extends Controller
{
    public function cauHoiTheoLinhVuc(Request $request)
    {
        $linhVuc = $request->query('linh_vuc');
        $cauhoi = CauHoi::where('linh_vuc_id', $linhVuc)->get()->random(1);
        $kq = [
            'success' => true,
            'cauhoi'    => $cauhoi
        ];
        return \response()->json($kq);
    }
}
