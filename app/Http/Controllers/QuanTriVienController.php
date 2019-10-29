<?php

namespace App\Http\Controllers;

use App\QuanTriVien;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class QuanTriVienController extends Controller
{
    use AuthenticatesUsers;
    public function username()
    {
        return 'ten_dang_nhap';
    }
    public function dangNhap()
    {
        return view('dang-nhap');
    }

    public function xuLyDangNhap(Request $request)
    {
        $thongtin = $request->only(['ten_dang_nhap', 'mat_khau']);
        dd(Auth::attempt($thongtin));
        // dd($thongtin);
    }
}
