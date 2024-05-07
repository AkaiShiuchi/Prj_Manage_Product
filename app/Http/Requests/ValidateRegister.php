<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRegister extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:6',
                // 'regex:/^[a-zA-Z]+$/',
            ],
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.min' => 'Tên người dùng phải có ít nhất 6 kí tự',
            'email' => 'Định dạng email không hợp lệ',
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, một kí tự số và một kí tự đặc biệt.',
            'confirm_password' => 'Xác nhận mật khẩu không trùng khớp với mật khẩu'
        ];
    }
}