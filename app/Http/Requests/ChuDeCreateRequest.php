<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChuDeCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Tạm thời không phân quyền
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cd_ten' => 'required|min:3|max:50|unique:cusc_chude', //tên table cusc_chude
        ];
    }

    public function messages() 
    {
        return [
            'cd_ten.required' => 'Tên chủ đề bắt buộc nhập',
            'cd_ten.min' => 'Tên chủ đề ít nhất phải 3 ký tự trở lên',
            'cd_ten.max' => 'Tên chủ đề tối đa chỉ 50 ký tự',
            'cd_ten.unique' => 'Tên chủ đề này đã tồn tại. Vui lòng nhập tên chủ đề khác'
        ];
    }
}
