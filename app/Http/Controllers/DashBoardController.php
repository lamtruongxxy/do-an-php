<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

use App\NguoiChoi;
use App\LuotChoi;
use App\LichSuMuaCredit;
use App\Utilities\FormatPrice;

class DashBoardController extends Controller
{
    public function index()
    {
        $tongNguoiChoi = NguoiChoi::count();
        $tongLuotChoi = LuotChoi::whereDate('created_at', Carbon::today())->count();
        $doanhThu = LichSuMuaCredit::join('goi_credit', 'lich_su_mua_credit.goi_credit_id', '=', 'goi_credit.id')
                        ->whereDate('lich_su_mua_credit.created_at', Carbon::today())
                        ->sum('goi_credit.so_tien');
        $doanhThu = FormatPrice::VND($doanhThu);
        $lsMuaCredit = LichSuMuaCredit::whereDate('created_at', Carbon::today())->orderBy('created_at', 'desc')->get();
        $lsLuotChoi = LuotChoi::whereDate('created_at', Carbon::today())->get();
        return view('index', compact('tongNguoiChoi', 'tongLuotChoi', 'doanhThu', 'lsMuaCredit', 'lsLuotChoi'));
    }
}
