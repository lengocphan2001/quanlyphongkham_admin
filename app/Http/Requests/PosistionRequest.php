<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosistionRequest extends FormRequest
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
            'name' => 'required|string|unique:positions,name|min:3',
            'identity' => 'required|string|unique:positions,identity'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên vị trí công việc không được để trống',
            'name.unique' => 'Tên vị trí công việc đã tồn tại',
            'identity.required' => 'Mã vị trí công việc không được để trống',
            'identity.unique' => 'Mã vị trí công việc đã tồn tại'
        ];
    }
}
