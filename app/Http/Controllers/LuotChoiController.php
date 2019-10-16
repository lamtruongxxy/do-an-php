<?php

namespace App\Http\Controllers;

use App\LuotChoi;
use Illuminate\Http\Request;

class LuotChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('luot-choi.index');
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
     * @param  \App\LuotChoi  $luotChoi
     * @return \Illuminate\Http\Response
     */
    public function show(LuotChoi $luotChoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LuotChoi  $luotChoi
     * @return \Illuminate\Http\Response
     */
    public function edit(LuotChoi $luotChoi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LuotChoi  $luotChoi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LuotChoi $luotChoi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LuotChoi  $luotChoi
     * @return \Illuminate\Http\Response
     */
    public function destroy(LuotChoi $luotChoi)
    {
        //
    }
}
