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
            "ten_linh_vuc" => "required|min:3|max:20|unique:linh_vuc,ten_linh_vuc"
            
        ];
    }

    public function messages()
    {
        return[
            "ten_linh_vuc.required" => "Điền tên lĩnh vực",
            "ten_linh_vuc.min" =>"Nhập từ 3 ký tự trở lên",
            "ten_linh_vuc.max" =>"Nhập từ 20 ký tự trở xuống",
            "ten_linh_vuc.unique" =>"Lĩnh vực đã tồn tại"

        ];
    }
}
