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
    		return response()->json($dsGoiCredit, 200);
    }

    public function ChiTietGoiCredit($id)
    {
    		$goicredit = GoiCredit::find($id);
    		return response()->json($goicredit, 200);
    }
}
