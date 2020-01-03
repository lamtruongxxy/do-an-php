<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

use App\LichSuMuaCredit;
use App\Utilities\FormatPrice;

class LichSuMuaCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsLichSuMuaCredit = LichSuMuaCredit::all();
        $doanhThu = LichSuMuaCredit::join('goi_credit', 'lich_su_mua_credit.goi_credit_id', '=', 'goi_credit.id')
                        ->whereDate('lich_su_mua_credit.created_at', Carbon::today())
                        ->sum('goi_credit.so_tien');
        $doanhThuThang = LichSuMuaCredit::join('goi_credit', 'lich_su_mua_credit.goi_credit_id', '=', 'goi_credit.id')
                            ->whereMonth('lich_su_mua_credit.created_at', Carbon::today())
                            ->whereYear('lich_su_mua_credit.created_at', Carbon::today())
                            ->sum('goi_credit.so_tien');
        $doanhThuNam = LichSuMuaCredit::join('goi_credit', 'lich_su_mua_credit.goi_credit_id', '=', 'goi_credit.id')
                            ->whereYear('lich_su_mua_credit.created_at', Carbon::today())
                            ->sum('goi_credit.so_tien');
        $doanhThu = FormatPrice::VND($doanhThu);
        $doanhThuThang = FormatPrice::VND($doanhThuThang);
        $doanhThuNam = FormatPrice::VND($doanhThuNam);
        $ngay = Carbon::now()->day;
        $thang = Carbon::now()->month;
        $nam = Carbon::now()->year;
        return view('lich-su-mua-credit.index', compact('dsLichSuMuaCredit', 'doanhThu', 'doanhThuThang', 'doanhThuNam', 'ngay', 'thang', 'nam'));
    }
}
