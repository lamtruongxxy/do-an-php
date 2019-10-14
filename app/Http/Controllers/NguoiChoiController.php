<?php

namespace App\Http\Controllers;

use App\NguoiChoi;
use Illuminate\Http\Request;

class NguoiChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsNguoiChoi = NguoiChoi::all();
        return view('nguoi-choi.index', compact('dsNguoiChoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function trashList()
    {
        $dsNguoiChoi = NguoiChoi::onlyTrashed()->get();
        return view('nguoi-choi.trash-list', compact('dsNguoiChoi'));
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
     * @param  \App\NguoiChoi  $nguoiChoi
     * @return \Illuminate\Http\Response
     */
    public function show(NguoiChoi $nguoiChoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NguoiChoi  $nguoiChoi
     * @return \Illuminate\Http\Response
     */
    public function edit(NguoiChoi $nguoiChoi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NguoiChoi  $nguoiChoi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NguoiChoi $nguoiChoi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NguoiChoi  $nguoiChoi
     * @return \Illuminate\Http\Response
     */
    public function destroy(NguoiChoi $nguoiChoi)
    {
        //
    }
}
