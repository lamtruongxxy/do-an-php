<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinhVuc;
use Validator;
use Illuminate\Validation\Rule;

class LinhVucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsLinhVuc = LinhVuc::select('id', 'ten_linh_vuc')->get();
        return view('linh-vuc.index', compact('dsLinhVuc'));
    }

    // public function layDanhSachLinhVuc()
    // {
    //     $dsLinhVuc = LinhVuc::select('id', 'ten_linh_vuc')->get();
    //     return Datatables()
    //             ->of($dsLinhVuc)
    //             ->addColumn('action', function($data) {
    //                 return view('linh-vuc.datatable', compact('data'));
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    // }

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
        // $rule = [
        //     'ten_linh_vuc'  => ['required', 'unique:linh_vuc']
        // ];
        // $message = [
        //     'ten_linh_vuc.required' => 'Tên lĩnh vực không để trống',
        //     'ten_linh_vuc.unique'   => "Tên lĩnh vực đã tồn tại"
        // ];
        // $valid = Validator::make($request->all(), $rule, $message);
        // if ($valid->fails()) {
        //     return back()->withErrors([$valid->errors()->all()])->withInput();
        // }
        // $result = LinhVuc::create([
        //     'ten_linh_vuc'  => $request->ten_linh_vuc
        // ]);
        // if ($result) {
        //     return back()->with('msg', 'Thêm lĩnh vực thành công');
        // }
        // return back()->withErrors(['Thêm lĩnh vực thất bại'])->withInput();
        $kq = LinhVuc::create($request->all());
        if ($kq) {
            $thongbao = Array(
                "text"      => "Thêm lĩnh vực thành công",
                "icon"   => "success",

            );
            return back()->with('msg', $thongbao);
        }
        return back()
                ->withErrors('Thêm lĩnh vực thất bại')
                ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $linhvuc = LinhVuc::findOrFail($request->id);
            $linhvuc->ten_linh_vuc = $request->ten_linh_vuc;
            $kq = $linhvuc->save();
            if ($kq) {
                $thongbao = Array(
                    "text"      => "Cập nhật lĩnh vực thành công",
                    "icon"   => "info",
                    
                );
                return back()->with('msg', $thongbao);
            }
            return back()
                    ->withErrors('Cập nhật lĩnh vực thất bại')
                    ->withInput();
        } catch (Exception $e) {
            return back()
                    ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                    ->withInput();
        }
        
        // $rule = [
        //     'id'            => ['required', 'exists:linh_vuc,id'],
        //     'ten_linh_vuc'  => [
        //         'required',
        //         Rule::unique('linh_vuc')->ignore($request->id)
        //     ]
        // ];
        // $message = [
        //     'id.required'           => 'Trường ID không để trống',
        //     'ten_linh_vuc.required' => "Trường tên lĩnh vực không để trống",
        //     'id.exists'             => "ID không tồn tại",
        //     'ten_linh_vuc.unique'   => "Tên lĩnh vực đã tồn tại",
        // ];
        // $valid = Validator::make($request->all(), $rule, $message);
        // if($valid->passes()) {
        //     $output = $this->updateLinhVuc($request->id, $request->ten_linh_vuc);
        //     return response()->json($output);
        // }
        // $errors = [];
        // return response()->json(['errors' => $valid->errors()->all()]);
    }

    // private function updateLinhVuc($id, $ten_linh_vuc) {
    //     $linh_vuc = LinhVuc::find($id);
    //     $linh_vuc->ten_linh_vuc = $ten_linh_vuc;
    //     $linh_vuc->save();
    //     return ['success' => "Cập nhật thành công"];
    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // try {
        //     $data = LinhVuc::findOrFail($id);
        //     $result = $data->delete();
        //     if ($result) {
        //         $msg = [
        //             'status' => true,
        //             'msg'   => 'Xoá lĩnh vực thành công'
        //         ];
        //         return response()->json($msg);
        //     }
        // } catch (Exception $e) {
        //     $msg = [
        //         'status'    => false,
        //         'msg'   => 'Xoá lĩnh vực thất bại'
        //     ];
        //     return response()->json($msg);
        // }
        try {
            $linhvuc = LinhVuc::findOrFail($id);
            $kq = $linhvuc->delete();
            if ($kq) {
                $thongbao = Array(
                    "text"      => "Xoá lĩnh vực thành công",
                    "icon"   => "warning",
                );
                return back()->with('msg', $thongbao);
            }
            return back()->withErrors('Xoá lĩnh vực thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

    public function trashList()
    {
        $db = LinhVuc::onlyTrashed()->get();
        return view('linh-vuc.trash-list', compact('db'));
    }

    public function restore(Request $request)
    {
        try {
            $id = $request->id;
            $kq = LinhVuc::onlyTrashed()
                    ->findOrFail($id)
                    ->restore();
            if ($kq) {
                return back()->with('msg', 'Khôi phục lĩnh vực thành công');
            }
            return back()->withErrors('Khôi phục lĩnh vực thất bại');
        } catch (Exception $ex) {
            return back()->withErrors('Có lỗi xãy ra, mời thử lại sau');
        }
    }
}
