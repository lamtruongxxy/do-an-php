<?php

namespace App\Http\Controllers;

use App\QuanTriVien;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class QuanTriVienController extends Controller
{
   public function getLogin()
   {
    return view("dang-nhap.index");
   }

   public function postLogin(Request $request)
   {
    $cen = $request->only("ten_dang_nhap","password");
    if(Auth::attempt($cen))
    {
        return redirect()->route('linh-vuc.index');
    }

    else
    {
        return back()->withInput();
    }
   }

   public function logout()
   {
    Auth::logout();
    return  \redirect()->route("get-login");
   }
}
