<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfile extends FormRequest
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
                'min: 6',
            ],
            'phone_number' => [
                'required',
                'phone'
            ],
            'email' => [
                'required',
                'email'
            ],
            'cityId' => 'required',
            'districtId' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 6 ký tự',
            'phone_number.required' => 'Vui lòng nhập số điện thoại',
            'phone.phone' => 'Số điện thoại không đúng định dạng',
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'email.email' => 'Địa chỉ email không đúng định dạng',
            'cityId' => 'Vui lòng chọn tỉnh/thành phố',
            'districtId' => 'VUi lòng chọn quận/huyện',
            'address' => 'Vui lòng nhập địa chỉ chi tiết',
        ];
    }
}
