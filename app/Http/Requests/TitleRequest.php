<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitleRequest extends FormRequest
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
            'identity' => 'required|unique:titles,identity|min:3',
            'name' => 'required|unique:titles,name|min:6',
            'english_name' => 'required|min:3|string|unique:titles,english_name'
        ];
    }
    public function messages(){
        return [
            'identity.required' => 'Mã chức danh không được để trống',
            'identity.unique' => 'Mã chức danh đã tồn tại',
            'identity.min' => 'Mã chức danh có tối thiểu 3 ký tự',
            'name.required' => 'Tên chức danh không được để trống',
            'name.unique' => 'Tên chức danh đã tồn tai',
            'name.min' => 'Tên chức danh có tối thiểu 6 ký tự',
            'english_name.required' => 'Tên tiếng anh không được để trống',
            'english_name.unique' => 'Tên tiếng anh đã tồn tại'
        ];
    }
}
