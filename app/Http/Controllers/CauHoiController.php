<?php

namespace App\Http\Controllers;

use App\CauHoi;
use App\LinhVuc;
use Illuminate\Http\Request;
use App\Http\Requests\CauHoiRequest;

class CauHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsCauHoi = CauHoi::all();
        return view('cau-hoi.index', compact('dsCauHoi'));
    }

    public function trashList()
    {
        $dsCauHoi = CauHoi::onlyTrashed()->get();
        return view('cau-hoi.trash-list', compact('dsCauHoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsLinhVuc = LinhVuc::all();
        return view('cau-hoi.form', compact('dsLinhVuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CauHoiRequest $request)
    {
        // dd($request->dap_an);
        try {
            $kq = CauHoi::create($request->all());
            if ($kq) {
                return back()->with('msg', 'Thêm câu hỏi thành công');
            }
            return back()
                    ->withErrors('Thêm câu hỏi thất bại')
                    ->withInput();
        } catch (Exception $e) {
            return back()
                    ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                    ->withInput();
        }
        // dd($request->dap_an);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CauHoi  $cauHoi
     * @return \Illuminate\Http\Response
     */
    public function show(CauHoi $cauHoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CauHoi  $cauHoi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $cauhoi = CauHoi::findOrFail($id);
            $dsLinhVuc = LinhVuc::all();
            return view('cau-hoi.form', compact('cauhoi', 'dsLinhVuc'));
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CauHoi  $cauHoi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kq = CauHoi::findOrFail($id)->update($request->all());
        try {
            if ($kq) {
                return redirect()
                        ->route('cau-hoi.index')
                        ->with('msg', 'Cập nhật câu hỏi thành công');
            }
            return back()
                    ->withErrors('Cập nhật câu hỏi thất bại')
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
     * @param  \App\CauHoi  $cauHoi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $kq = CauHoi::findOrFail($id)->delete();
            if ($kq) {
                return back()->with('msg', 'Xoá câu hỏi thành công');
            }
            return back()->withErrors('Xoá câu hỏi thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

    public function restore($id)
    {
        try {
            $cauHoi = CauHoi::onlyTrashed()->findOrFail($id);
            $cauHoi->restore();
            $linhVuc = LinhVuc::withTrashed()->findOrFail($cauHoi->linh_vuc_id)->restore();
            if ($cauHoi && $linhVuc) {
                return back()->with('msg', 'Khôi phục câu hỏi thành công');
            }
            return back()->withErrors('Khôi phục câu hỏi thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

     public function delete($id)
    {
        $result = CauHoi::where('id', $id)->forceDelete();

        return back()->with('msg', 'Xoá câu hỏi thành công');
    }
}
