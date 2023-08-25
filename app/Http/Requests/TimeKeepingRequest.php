<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeKeepingRequest extends FormRequest
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
            'identity' => 'required|unique:base_time_keepings,identity|min:3',
            'name' => 'required|unique:base_time_keepings,name|min:6',
        ];
    }

    public function messages(){
        return [
            'identity.required' => 'Mã loại chấm công không được để trống',
            'identity.unique' => 'Mã loại chấm công đã tồn tại',
            'identity.min' => 'Mã loại chấm công có tối thiểu 3 ký tự',
            'name.required' => 'Tên loại chấm công không được để trống',
            'name.unique' => 'Tên loại chấm công đã tồn tai',
            'name.min' => 'Tên loại chấm công có tối thiểu 6 ký tự',
        ];
    }
}
