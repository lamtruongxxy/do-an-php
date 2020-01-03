<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CauHoiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "noi_dung"      => "required|min:3",
            "linh_vuc_id"   => "required|exists:linh_vuc,id",
            "phuong_an_a"   =>"required",
            "phuong_an_b"   =>"required",
            "phuong_an_c"   =>"required",
            "phuong_an_d"   =>"required",
            "dap_an"        =>"required"

         ];
    }

    public function messages()
    {
        return [
            "noi_dung.required"     =>"Điền đầy đủ nội dung",
            "linh_vuc_id.required"  => "Lĩnh vực không để trống",
            "linh_vuc_id.exists"    => "Lĩnh vực không tồn tại",
            "phuong_an_a.required"  =>"Điền phương án a",
            "phuong_an_b.required"  =>"Điền phương án b",
            "phuong_an_c.required"  =>"Điền phương án c",
            "phuong_an_d.required"  =>"Điền phương án d",
            "dap_an.required"       =>"Chọn đáp án",
        ];
    }
}
