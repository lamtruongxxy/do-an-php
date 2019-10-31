<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinhVuc;

class LinhVucAPI extends Controller
{
    public function layDSLinhVuc()
    {
        $db = LinhVuc::all()->random(4);
        $res = [
            "success"   => true,
            "data"      => $db
        ];
        return \response()->json($res);
    }
}
