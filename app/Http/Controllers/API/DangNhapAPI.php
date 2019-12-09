<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiChoi;

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

    public function dangKy (Request $request)
    {
 
        $nguoiChoi = [
            'ten_dang_nhap' => $request->ten_dang_nhap,
            'email'         => $request->email,
            'mat_khau'      => \Hash::make($request->password),
            'diem_cao_nhat' => 0,
            'credit'        => 0,
            'hinh_dai_dien' => ''
        ];

        $kq = NguoiChoi::create($nguoiChoi);

        if(!$kq)
        {
             $res = [
                'success'   => false,
                'msgg'       => 'Đăng ký thất bại, mời thử lại'
            ];
            return \response()->json($res);
        }

        $credentials = $request->only('ten_dang_nhap', 'password');

        $token = auth('api')->attempt($credentials);

        $res = [
        'success'   => true,
        'msgg'       => 'Đăng ký thành công',
        'token'     => $token,
        'type'      => 'Bearer', // you can ommit this
        'expires'   => auth('api')->factory()->getTTL() * 60 * 24 * 7
        ];
        return \response()->json($res);
    }
}
