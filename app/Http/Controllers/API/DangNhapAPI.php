<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Validator;
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
        $user = auth('api')->user();
        $res = [
            'success'   => true,
            'msg'       => 'Đăng nhập thành công',
            'user'        => $user,
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

    public function dangKy (Request $req)
    {
        // $nguoiChoi = [
        //     'ten_dang_nhap' => $request->ten_dang_nhap,
        //     'email'         => $request->email,
        //     'mat_khau'      => \Hash::make($request->password),
        //     'diem_cao_nhat' => 0,
        //     'credit'        => 0,
        //     'hinh_dai_dien' => ''
        // ];
        // $kq = NguoiChoi::create($nguoiChoi);

        // if(!$kq)
        // {
        //      $res = [
        //         'success'   => false,
        //         'msgg'       => 'Đăng ký thất bại, mời thử lại'
        //     ];
        //     return \response()->json($res);
        // }

        // $credentials = $request->only('ten_dang_nhap', 'password');

        // $token = auth('api')->attempt($credentials);
        // $user = auth('api')->user();
        // $res = [
        // 'success'   => true,
        // 'msgg'      => 'Đăng ký thành công',
        // 'user'      => $user,
        // 'token'     => $token,
        // 'type'      => 'Bearer', // you can ommit this
        // 'expires'   => auth('api')->factory()->getTTL() * 60 * 24 * 7
        // ];
        // return \response()->json($res);

        // $kq = Storage::putFileAs("public/avatar", \base64_decode($request->img_avatar), "asd");

        $valid = Validator::make(
            $req->all(),
            [
                'ten_dang_nhap' => 'required|unique:nguoi_choi,ten_dang_nhap',
                'email'         => 'required|email:rfc|unique:nguoi_choi,email',
                'ho_ten'        => 'required',
                'mat_khau'      => 'required|min:6|max:30',
                'hinh_dai_dien' => 'size:20000'
            ],
            [
                'ten_dang_nhap.required'    => 'Tên đăng nhập không để trống',
                'ten_dang_nhap.unique'      => 'Tên đăng nhập đã tồn tại',
                'email.required'            => 'Email không để trống',
                'email.email'                 => 'Không đúng định dạng email',
                'email.unique'              => 'Email đã tồn tại',
                'ho_ten.required'           => 'Họ tên không để trống',
                'mat_khau.required'         => 'Mật khẩu không để trống',
                'mat_khau.min'              => 'Mật khẩu tối thiểu 6 ký tự',
                'mat_khau.max'              => 'Mật khẩu tối đa 30 ký tự',
                'hinh_dai_dien'             => 'Hình đại diện tối đa 20MB'
            ]
        );

        // dd($valid->passes());


        if (!$valid->passes()) {
            return \response()->json(['status' => false, 'msg' => $valid->errors()->first()]);
        }

        $hinh_dai_dien = 'avatar_temp.jpg'; 
        if(isset($req->img_avatar))  {
            $img = base64_decode($req->img_avatar);
            $uploadImg = Storage::disk('public')->put('avatar/'. $req->ten_dang_nhap . '.jpg', $img);
            $hinh_dai_dien = $req->ten_dang_nhap . '.jpg';
        }

        $nguoiChoi = [
            'ten_dang_nhap' => $req->ten_dang_nhap,
            'mat_khau'      => Hash::make($req->mat_khau),
            'email'         => $req->email,
            'ho_ten'        => $req->ho_ten,
            'hinh_dai_dien' => $hinh_dai_dien,
        ];
        
        $result = NguoiChoi::create($nguoiChoi);

        if ($result) {
            $token = auth('api')->attempt(['ten_dang_nhap'  => $req->ten_dang_nhap, 'password' => $req->mat_khau]);
            $response = [
                'msg'       => 'Đăng ký tài khoản thành công',
                'status'    => true,
                'token'     => $token,
            ];
            return \response()->json($response);
        }

        return \response()->json(['status'  => false, 'msg' => 'Đăng ký thất bại']);
    }
}
