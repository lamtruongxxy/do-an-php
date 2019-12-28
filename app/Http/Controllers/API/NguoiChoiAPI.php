<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\NguoiChoi;
use App\ChiTietLuotChoi;
use App\LuotChoi;
use App\Jobs\SendMailForgotPwd;

use Carbon\Carbon;
use App\Mail\MailForgotPassword;
use App\QuenMatKhau;
use Exception;
use Illuminate\Support\Facades\Mail;

class NguoiChoiAPI extends Controller
{
    public function ChiTietNguoiChoi($id)
    {
				$nguoichoi = NguoiChoi::find($id);
				$res = [
					"success"	=> true,
					"data"		=> $nguoichoi
				];
    		return response()->json($res);
		}
		
    public function xepHang(Request $request)
    {
    		$page = $request->query("page", 1);
    		$limit = $request->query("limit", 25);
    		$listNguoiChoi = NguoiChoi::orderBy('diem_cao_nhat', 'desc')
    								->skip(($page - 1) * $limit)
    								->take($limit)
										->get();
				$res = [
					"success"	=> true,
					"total"	=> NguoiChoi::count(),
					"data"	=> $listNguoiChoi
				];
    		return response()->json($res);
    }

    public function LayDSNguoiChoi()
    {
			$dsNguoiChoi = NguoiChoi::all();
			$res = [
				"success"	=> true,
				"data"		=> $dsNguoiChoi
			];
    	return response()->json($res);
    }

    public function lichSuNguoiChoi($id)
	{
		$page = 1;
		$limit =25;
		// $listLuotChoi = ChiTietLuotChoi::orderBy('diem', 'desc')
		// 						->skip(($page - 1) * $limit)
		// 						->take($limit)
		// 							->get();
        $listLuotChoi = LuotChoi::where('nguoi_choi_id',$id)->orderBy('diem', 'desc')
                             ->skip(($page - 1) * $limit)
                             ->take($limit)
                                 ->get();
			$res = [
				"success"	=> true,
				"total"	=> count($listLuotChoi),
				"data"	=> $listLuotChoi
			];
		return response()->json($res);
	}

	public function capNhatNguoiChoi (Request $request)
	{
		
	}

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

    public function dangKy(Request $req)
    {
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

        if (!$valid->passes()) {
            return \response()->json(['success' => false, 'msg' => $valid->errors()->first()]);
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

        return \response()->json(['success'  => false, 'msg' => 'Đăng ký thất bại']);
	}
		
    public function sendMail(Request $req)
    {
        try {
            
            $valid = Validator::make(
                $req->all(),
                [
                    'email'	=> 'required|email:rfc|exists:nguoi_choi,email'
                ],
                [
                    'email.required'	=> 'Email không để trống',
                    'email.email'			=> 'Không đúng định dạng email',
                    'email.exists'		=> 'Email không tồn tại',
                ]
            );

            if (!$valid->passes()) {
                return \response()->json(['success' => false, 'msg' => $valid->errors()->first()]);
            }

            SendMailForgotPwd::dispatch($req->email);

            return response()->json(['success'  => true, 'msg'  => 'Vui lòng vào email lấy mã xác nhận']);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Có lỗi xảy ra, mời thử lại sau']);
        }
    }
}
