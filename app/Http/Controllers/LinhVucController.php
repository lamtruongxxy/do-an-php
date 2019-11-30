<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinhVuc;
use App\CauHoi;
use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LinhVucRequest;

class LinhVucController extends Controller
{
    public function index()
    {
        $dsLinhVuc = LinhVuc::select('id', 'ten_linh_vuc', 'hinh_anh')->get();
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

    public function store(LinhVucRequest $request)
    {
        # Upload hình
        $hinh_anh = $this->uploadHinh($request->file('hinh_anh'));
        $linh_vuc = [
            'ten_linh_vuc'  => $request->ten_linh_vuc,
            'hinh_anh'      => $hinh_anh
        ];
        $kq = LinhVuc::create($linh_vuc);
        if ($kq) {
            return back()->with('msg', "Thêm lĩnh vực thành công");
        }
        return back()
                ->withErrors('Thêm lĩnh vực thất bại')
                ->withInput();
    }
    
    public function update(Request $request)
    {
        try 
        {
            $linhvuc = LinhVuc::findOrFail($request->id);
            if ($request->file('hinh_anh_new')) 
            {
                $this->xoaHinh($linhvuc->hinh_anh);
                $linhvuc->hinh_anh = $this->uploadHinh($request->file('hinh_anh_new'));
            }
            $linhvuc->ten_linh_vuc = $request->ten_linh_vuc;
            $kq = $linhvuc->save();
            if ($kq) 
            {
                return back()->with('msg', "Cập nhật lĩnh vực thành công");
            }
            return back()
                    ->withErrors('Cập nhật lĩnh vực thất bại')
                    ->withInput();
        } catch (Exception $e) 
        {
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
    
    public function destroy($id)
    {
        try {
            $linhvuc = LinhVuc::findOrFail($id);
            $xoaDSCauHoi = CauHoi::where('linh_vuc_id', $id)->delete();
            $xoaLinhVuc = $linhvuc->delete();
            if ($xoaLinhVuc && $xoaDSCauHoi) {
                return back()->with('msg', "Xoá lĩnh vực thành công");
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
        try 
        {
            $id = $request->id;
            $linhvuc = LinhVuc::onlyTrashed()->findOrFail($id);
            $khoiPhucDSCauHoi = CauHoi::onlyTrashed()->where('deleted_at', $linhvuc->deleted_at)->restore();
            $khoiPhucLinhVuc = $linhvuc->restore();
            if ($khoiPhucLinhVuc && $khoiPhucDSCauHoi) 
            {
                return back()->with('msg', 'Khôi phục lĩnh vực thành công');
            }
            return back()->withErrors('Khôi phục lĩnh vực thất bại');
        } 
        catch (Exception $ex) 
        {
            return back()->withErrors('Có lỗi xãy ra, mời thử lại sau');
        }
    }

    public function uploadHinh($img)
    {
        $type_img = $img->getClientOriginalExtension();
        $date = Carbon::now('Asia/Ho_Chi_Minh')->format('dmyHis');
        $new_img = $date. '-linh-vuc.' .$type_img;
        $img->storeAs('public/linh-vuc', $new_img);
        return $new_img;
    }

    public function xoaHinh($img)
    {
        $path = '/public/linh-vuc/' . $img;
        $isExists = Storage::disk('local')->exists($path);
        if ($isExists)
        {
            Storage::disk('local')->delete($path);
        }
    }

}
