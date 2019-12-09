<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinhVucRequest extends FormRequest
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
            "ten_linh_vuc" => "required|min:3|max:15|unique:linh_vuc,ten_linh_vuc",
            "hinh_anh" => "required|mimes:jpg,png,jpge"
        ];
    }

    public function messages()
    {
        return[
            "ten_linh_vuc.required" => "Tên lĩnh vực không trống",
            "ten_linh_vuc.min" =>"Nhập từ 3 ký tự trở lên",
            "ten_linh_vuc.max" =>"Nhập từ 15 ký tự trở xuống",
            "ten_linh_vuc.unique" =>"Lĩnh vực đã tồn tại",
            "hinh_anh.required" => "Hình ảnh không để trống",
            "hinh_anh.mimes"    => "Định dạng hình ảnh phải là jpg, jpge, png"
        ];
    }
}
