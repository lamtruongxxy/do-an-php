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
}
