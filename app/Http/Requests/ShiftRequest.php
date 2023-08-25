<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShiftRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'identity' => 'required|unique:shifts,identity|min:3',
            'name' => 'required|unique:shifts,name|min:6',
            'minutes' => 'required|numeric|max:480|min:10',
            
        ];
    }

    public function messages(){
        return [
            'identity.required' => 'Mã loại hợp đồng không được để trống',
            'identity.unique' => 'Mã loại hợp đồng đã tồn tại',
            'identity.min' => 'Mã loại hợp đồng có tối thiểu 3 ký tự',
            'name.required' => 'Tên loại hợp đồng không được để trống',
            'name.unique' => 'Tên loại hợp đồng đã tồn tai',
            'name.min' => 'Tên loại hợp đồng có tối thiểu 6 ký tự',
            'minutes.max' => 'Số phút làm việc tiêu chuẩn nhỏ hơn 480 phút',
            'minutes.min' => 'Số phút làm việc tiêu chuẩn lớn hơn 10 phút',
            'minutes.required' => 'Số phút làm việc tiêu chuẩn không được để trống',
        ];
    }
}
