<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name' => 'required|min:6|unique:departments',
            'identity' => 'required|unique:departments,identity'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên phòng ban không được để trống',
            'name.min' => 'Tên phòng ban có tối thiếu 6 kí tự',
            'name.unique' => 'Tên phòng ban đã tồn tại',
            'identity.required' => 'Mã phòng ban không được để trống',
            'identity.unique' => 'Mã phòng ban đã tồn tại'
        ];
    }
}
