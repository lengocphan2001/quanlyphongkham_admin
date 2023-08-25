<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'identity' => 'required|string|unique:employees,identity|min:5',
            'identity_card' => 'required|string|unique:employees,identity_card|min:12|max:12',
            'fullname' => 'required|string|min:4',
            'phone' => 'required|regex:/(0)[0-9]{9}/|unique:employees,phone|min:10|max:10',
            'email' => 'required|email|unique:employees,email'
        ];
    }

    public function messages()
    {
        return [
            'identity.required' => 'Mã nhân viên không được để trống',
            'identity.unique' => 'Mã nhân viên đã tồn tại',
            'identity.min' => 'Mã nhân viên có tối thiểu 5 ký tự',
            'identity_card.required' => 'CCCD không được để trống',
            'identity_card.unique' => 'CCCD đã tồn tại',
            'identity_card.min' => 'CCCD có tối thiểu 12 ký tự',
            'identity_card.max' => 'CCCD có tối da 12 ký tự',
            'fullname.required' => 'Họ và tên không để trống',
            'fullname.min' => 'Họ tên có tối thiếu 4 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.min' => 'Số điện thoại phải có 10 chữ số',
            'phone.max' => 'Số điện thoại phải có 10 chữ số',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'email.required' => 'Email khong được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
        ];
    }
}
