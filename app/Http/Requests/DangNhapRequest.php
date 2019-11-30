<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapRequest extends FormRequest
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
            "ten_dang_nhap" => "required|exists:quan_tri_vien",
            "password"      => "required"
        ];
    }

    public function messages()
    {
        return[
            "ten_dang_nhap.required"   => "Tên đăng nhập không được bỏ trống",
            "password.required"        => "Mật khẩu không được để trống",
            "ten_dang_nhap.exists"   => "Tên đăng nhập không tồn tại",
            
        ];
    }
}
