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
            "noi_dung" => "required|min:3|unique:cau_hoi,noi_dung",
            "phuong_an_a" =>"required|min:3|max:20",
            "phuong_an_b" =>"required|min:3|max:20",
            "phuong_an_c" =>"required|min:3|max:20",
            "phuong_an_d" =>"required|min:3|max:20",
            "dap_an" =>"required"

         ];
    }

    public function messages()
    {
        return [
        "noi_dung.required" =>"Điền đầy đủ nội dung",
        "phuong_an_a.required" =>"Điền phương án a",
        "phuong_an_b.required" =>"Điền phương án b",
        "phuong_an_c.required" =>"Điền phương án c",
        "phuong_an_d.required" =>"Điền phương án d",
        "dap_an.required" =>"Chọn đáp án",

        "noi_dung.min" =>"Nội dung phải từ 3 ký tự trở lên",
        "phuong_an_a.min" =>"Phương án a từ 3 ký tự trở lên",
        "phuong_an_b.min" =>"Phương án b từ 3 ký tự trở lên",
        "phuong_an_c.min" =>"Phương án c từ 3 ký tự trở lên",
        "phuong_an_d.min" =>"Phương án d từ 3 ký tự trở lên",

         "phuong_an_a.max" =>"Phương án a tối đa 20 ký tự",
        "phuong_an_b.max" =>"Phương án b tối đa 20 ký tự",
        "phuong_an_c.max" =>"Phương án c tối đa 20 ký tự",
        "phuong_an_d.max" =>"Phương án d tối đa 20 ký tự"

        ];
    }
}
