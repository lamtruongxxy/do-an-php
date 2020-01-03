<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoiCreditRequest extends FormRequest
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
            "ten_goi"=>"required|min:3|unique:goi_credit,ten_goi",
            "credit"=>"required|unique:goi_credit,credit",
            "so_tien"=>"required|numeric"
        ];
    }

    public function messages()
    {
        return[
           "ten_goi.required" =>"Điền đầy đủ tên Credit",
           "credit.required" =>"Nhập số gói Credit",
           "so_tien.required" =>"Nhập số tiền Credit",

           "ten_goi.min"=>"Tên gói Credit từ 3 ký tự trở lên",
           "credit.unique"=>"Số Credit đã tồn tại",

           "ten_goi.unique"=>"Tên gói đã tồn tại",

           "so_tien.numeric" => "Số tiền phải là số"
        ];
    }
}
