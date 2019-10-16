<?php

namespace App\Http\Controllers;

use App\LichSuMuaCredit;
use Illuminate\Http\Request;

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
        return view('lich-su-mua-credit.index', compact('dsLichSuMuaCredit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LichSuMuaCredit  $lichSuMuaCredit
     * @return \Illuminate\Http\Response
     */
    public function show(LichSuMuaCredit $lichSuMuaCredit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LichSuMuaCredit  $lichSuMuaCredit
     * @return \Illuminate\Http\Response
     */
    public function edit(LichSuMuaCredit $lichSuMuaCredit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LichSuMuaCredit  $lichSuMuaCredit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LichSuMuaCredit $lichSuMuaCredit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LichSuMuaCredit  $lichSuMuaCredit
     * @return \Illuminate\Http\Response
     */
    public function destroy(LichSuMuaCredit $lichSuMuaCredit)
    {
        //
    }
}
