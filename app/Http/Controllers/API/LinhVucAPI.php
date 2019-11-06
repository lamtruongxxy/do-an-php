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
            $dsLinhVuc = LinhVuc::select('id', 'ten_linh_vuc', 'hinh_anh')->get()->random(4);
            $res = [
                'success' => true,
                'data' => $dsLinhVuc
            ];
    		return response()->json($res, 200);
    }
}
