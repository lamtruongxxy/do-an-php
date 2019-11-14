<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\LinhVuc;

class LinhVucAPI extends Controller
{
	// protected $dateFormat = 'd/m/Y H:i:s';
    public function DSLinhVuc()
    {
        $count = LinhVuc::count();
        if ($count >= 4)
        {
            $dsLinhVuc = LinhVuc::select('id', 'ten_linh_vuc', 'hinh_anh')->get()->random(4);
        }
        else
        {
            $dsLinhVuc = LinhVuc::select('id', 'ten_linh_vuc', 'hinh_anh')->get()->random($count);
        }
        $res = [
            'success'   => true,
            'data'      => $dsLinhVuc,
            'msg'       => 'Load lĩnh vực thành công'
        ];
        return response()->json($res, 200);
    }
}
