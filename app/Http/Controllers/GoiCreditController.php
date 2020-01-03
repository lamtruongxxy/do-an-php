<?php

namespace App\Http\Controllers;

use App\GoiCredit;
use Illuminate\Http\Request;
use App\Http\Requests\GoiCreditRequest;

class GoiCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsGoiCredit = GoiCredit::all();
        return view('goi-credit.index', compact('dsGoiCredit'));
    }

    public function trashList()
    {
        $dsGoiCredit = GoiCredit::onlyTrashed()->get();
        return view('goi-credit.trash-list', compact('dsGoiCredit'));
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
    public function store(GoiCreditRequest $request)
    {
        $kq = GoiCredit::create($request->all());
        if($kq)
        {
            return back()->with('msg', 'Thêm gói credit thành công');
        }
        else
        {
            return back()->withErrors('Thêm gói credit thất bại')->withInput();

        }
    }

    public function update(GoiCreditRequest $request)
    {
        try {
            $goiCredit = GoiCredit::findOrFail($request->id);
            $goiCredit->ten_goi = $request->ten_goi;
            $goiCredit->credit = $request->credit;
            $goiCredit->so_tien = $request->so_tien;
            $kq = $goiCredit->save();
            if ($kq) {
                return back()->with('msg', 'Cập nhật gói credit thành công');
            }
            return back()
                    ->withErrors('Cập nhật gói credit thất bại')
                    ->withInput();
        } catch (Exception $e) {
            return back()
                    ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                    ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GoiCredit  $goiCredit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $goiCredit = GoiCredit::findOrFail($id);
            $kq = $goiCredit->delete();
            if ($kq) {
                return back()->with('msg', 'Xoá gói credit thành công');
            }
            return back()->withErrors('Xoá gói credit thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

    public function restore(Request $request)
    {
        try {
            $id = $request->id;
            $kq = GoiCredit::onlyTrashed()
                    ->findOrFail($id)
                    ->restore();
            if ($kq) {
                return back()->with('msg', 'Khôi phục gói credit thành công');
            }
            return back()->withErrors('Khôi phục gói credit thất bại');
        } catch (Exception $ex) {
            return back()->withErrors('Có lỗi xãy ra, mời thử lại sau');
        }
    }

     public function delete($id)
    {
        $result = GoiCredit::where('id', $id)->forceDelete();
        return back()->with('msg', 'Xoá gói credit thành công');
    }
}
