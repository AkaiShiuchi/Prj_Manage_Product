<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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
            'oldpassword' => 'required',
            'newpassword' => [
                'required',
                'min:6'
            ],
            'repassword' => [
                'same:newpassword'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'oldpassword' => 'Vui lòng nhập mật khẩu cũ',
            'newpassword.required' => 'Vui lòng nhập mật khẩu mới',
            'newpassword.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự',
            'repassword' => 'Xác nhận mật khẩu không trùng khớp với mật khẩu mới'
        ];
    }
}
