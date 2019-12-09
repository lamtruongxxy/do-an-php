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
        $cauhoi = CauHoi::where('linh_vuc_id', $linhVuc)->get();

        if (count($cauhoi) === 0)
        {
            $res = [
                'success'   => false,
                'msg'       => 'Không tìm thấy câu hỏi tương ứng'
            ];
            return response()->json($res);
        }

        $res = [
            'success'   => true,
            'msg'       => 'Tải câu hỏi thành công',
            'data'      => $cauhoi
        ];
        return response()->json($res);

        // CauHoi::select('id', 'noi_dung', 'phuong_an_a', 'phuong_an_b', 'phuong_an_c', 'phuong_an_d', 'dap_an')
        //                     ->where('linh_vuc_id', $linhVuc)
        //                     ->get();
        // if (count($cauhoi))
        // {
        //     $res = [
        //         'success' => true,
        //         'msg'     => 'Load câu hỏi thành công',
        //         'data'    => $cauhoi->random(1)->first()
        //     ];
        //     return \response()->json($res);
        // }

        // $res = [
        //     'success'   => false,
        //     'msg'       => 'Load câu hỏi thất bại'
        // ];
        // return \response()->json($res, 400);
        
    }
}
