<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinhVuc;

class LinhVucAPI extends Controller
{
	// protected $dateFormat = 'd/m/Y H:i:s';
    public function DSLinhVuc()
    {
            $dsLinhVuc = LinhVuc::select('id', 'ten_linh_vuc')->get()->random(4);
            $kq = [
                'success' => true,
                'dsLinhVuc' => $dsLinhVuc
            ];
    		return response()->json($kq, 200);
    }

    public function DSCauHoiTheoLinhVuc($id)
    {
    		$dsCauHoi = LinhVuc::find($id)->dsCauHoi;
    		return response()->json($dsCauHoi, 200);
    }
}
