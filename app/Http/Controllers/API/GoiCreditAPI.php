<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GoiCredit;

class GoiCreditAPI extends Controller
{
    public function DSGoiCredit()
    {
            $dsGoiCredit = GoiCredit::all();
            $res = [
                "success"   => true,
                "data"      => $dsGoiCredit
            ];
    		return response()->json($res);
    }

    public function ChiTietGoiCredit($id)
    {
            $goicredit = GoiCredit::find($id);
            $res = [
                "success"   => true,
                "data"      => $goicredit
            ];
    		return response()->json($res);
    }

    public function muaGoiCredit (Request $request)
    {
        $goicredits = GoiCredit::where('id',$request->id)->get();
        if($goicredits)
        {
            $credit = 0;
            foreach ($goicredits as $goicredit) {
                $credit = $goicredit->credit;
            }
            $res = [
                "success"   => true,
                'msg'       => 'Mua gói credit thành công',
                "data"      => $credit
            ];
            return response()->json($res);
        }
        $res = [
                "success"   => false,
                'msg'       => 'Mua gói credit thất bại'
            ];
            return response()->json($res);
    }
}
