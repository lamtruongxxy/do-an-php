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
        if (request()->ajax()) {
            return Datatables()
                    ->of(LinhVuc::select('id', 'ten_linh_vuc')->get())
                    ->addColumn('action', function($data) {
                        $button = "<button 
                                        class='btn btn-warning waves-effect waves-light sua_linh_vuc' 
                                        type='button'
                                        data-id='$data->id'
                                        data-name='$data->ten_linh_vuc'
                                        data-toggle='modal'
                                        data-target='#form-edit'>
                                    <i class='far fa-edit'></i>
                                      Sửa
                                  </button>";
                        $button .= '&nbsp;&nbsp;';
                        $button .= "<a 
                                        class='btn btn-danger waves-effect waves-light xoa_linh_vuc'
                                        href='http://localhost:8000/linh-vuc/xoa-linh-vuc/$data->id' >
                                    <i class='far fa-trash-alt'></i>
                                      Xoá
                                  </a>";
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('linh-vuc.index');
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
        $rule = [
            'ten_linh_vuc'  => ['required', 'unique:linh_vuc']
        ];
        $message = [
            'ten_linh_vuc.required' => 'Tên lĩnh vực không để trống',
            'ten_linh_vuc.unique'   => "Tên lĩnh vực đã tồn tại"
        ];
        $valid = Validator::make($request->all(), $rule, $message);
        if ($valid->fails()) {
            return back()->withErrors([$valid->errors()->all()])->withInput();
        }
        $result = LinhVuc::create([
            'ten_linh_vuc'  => $request->ten_linh_vuc
        ]);
        if ($result) {
            return back()->with('msg', 'Thêm lĩnh vực thành công');
        }
        return back()->withErrors(['Thêm lĩnh vực thất bại'])->withInput();
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
        //
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
        $rule = [
            'id'            => ['required', 'exists:linh_vuc,id'],
            'ten_linh_vuc'  => [
                'required',
                Rule::unique('linh_vuc')->ignore($request->id)
            ]
        ];
        $message = [
            'id.required'           => 'Trường ID không để trống',
            'ten_linh_vuc.required' => "Trường tên lĩnh vực không để trống",
            'id.exists'             => "ID không tồn tại",
            'ten_linh_vuc.unique'   => "Tên lĩnh vực đã tồn tại",
        ];
        $valid = Validator::make($request->all(), $rule, $message);
        if($valid->passes()) {
            $output = $this->updateLinhVuc($request->id, $request->ten_linh_vuc);
            return response()->json($output);
        }
        $errors = [];
        return response()->json(['errors' => $valid->errors()->all()]);
    }

    private function updateLinhVuc($id, $ten_linh_vuc) {
        $linh_vuc = LinhVuc::find($id);
        $linh_vuc->ten_linh_vuc = $ten_linh_vuc;
        $linh_vuc->save();
        return ['success' => "Cập nhật thành công"];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = LinhVuc::findOrFail($id);
            $result = $data->delete();
            if ($result) {
                return back()->with('msg-delete', 'Xoá lĩnh vực thành công');
            }
            return back()->withErrors(['Xoá lĩnh vực thất bại']);
        } catch (Exception $e) {
            return back()->withErrors(['Có lỗi xảy ra, mời thử lại sau']);
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
            $result = LinhVuc::onlyTrashed()->findOrFail($id)->restore();
            if ($result) {
                return back()->with('msg', 'Khôi phục lĩnh vực thành công');
            }
        } catch (Exception $ex) {
            return back()->withErrors(['Có lỗi xãy ra, mời thử lại sau']);
        }
    }
}
