<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DangNhapAPI extends Controller
{
    public function dangNhap(Request $request)
    {
        $credentials = $request->only('ten_dang_nhap', 'password');

        $token = auth('api')->attempt($credentials);

        if (!$token)
        {
            $res = [
                'success'   => false,
                'msg'       => 'Đăng nhập thất bại, mời thử lại'
            ];
            return \response()->json($res);
        }

        $res = [
            'success'   => true,
            'msg'       => 'Đăng nhập thành công',
            'token'     => $token,
            'type'      => 'Bearer', // you can ommit this
            'expires'   => auth('api')->factory()->getTTL() * 60 * 24 * 7
        ];
        return \response()->json($res);
    }

    public function dangXuat()
    {
        auth('api')->logout();

        $res = [
            'success'   => true,
            'msg'       => 'Đăng xuất thành công'
        ];

        return \response()->json($res);
    }
}
