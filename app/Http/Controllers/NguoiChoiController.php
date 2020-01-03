<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NguoiChoi;
use App\LichSuMuaCredit;
use App\LuotChoi;
use Exception;

class NguoiChoiController extends Controller
{
    public function index()
    {
        $dsNguoiChoi = NguoiChoi::all();
        return view('nguoi-choi.index', compact('dsNguoiChoi'));
    }

    public function trashList()
    {
        $dsNguoiChoi = NguoiChoi::onlyTrashed()->get();
        return view('nguoi-choi.trash-list', compact('dsNguoiChoi'));
    }



    public function destroy($id)
    {
      try {
            $kq = NguoiChoi::findOrFail($id)->delete();
            if ($kq) {
                return back()->with('msg', 'Xoá người chơi thành công');
            }
            return back()->withErrors('Xoá người chơi thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

    public function restore(Request $request)
    {
       try {
            $id = $request->id;
            $nguoiChoi = NguoiChoi::onlyTrashed()->findOrFail($id);
            $nguoiChoi->restore();
            if ($nguoiChoi) {
                return back()->with('msg', 'Khôi phục người chơi thành công');
            }
            return back()->withErrors('Khôi phục người chơi thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

    public function delete($id)
    {
        $nguoiChoi = NguoiChoi::Where('id', $id)->forceDelete();
        return back()->with('msg', 'Xóa người chơi thành công');
    }

    public function profile($name)
    {
        try {
            $nguoiChoi = NguoiChoi::where('ten_dang_nhap', $name)->first();
            $lsMuaCredit = LichSuMuaCredit::where('nguoi_choi_id', $nguoiChoi->id)->get();
            $lsLuotChoi = LuotChoi::where('nguoi_choi_id', $nguoiChoi->id)->get();
    
            $dsNguoiChoi = NguoiChoi::orderBy('diem_cao_nhat', 'desc')->get();
            $hang = 0;
            for($i=0; $i<sizeof($dsNguoiChoi); $i++)
            {
                if ($dsNguoiChoi[$i]->ten_dang_nhap === $name) {
                    $hang = $i;
                    break;
                }
            }
            return view('nguoi-choi.profile', compact('nguoiChoi', 'lsMuaCredit', 'lsLuotChoi', 'hang'));
        } catch (Exception $ex) {
            return view('errors.404');
        }
        
    }
}
