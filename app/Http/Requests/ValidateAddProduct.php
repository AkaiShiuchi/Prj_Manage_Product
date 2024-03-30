<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAddProduct extends FormRequest
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
            'name' => 'required',
            'describe' => 'required',
            'price' => [
                'required',
                'numeric',
            ],
            'total' => [
                'required',
                'numeric',
                'min:1',
            ],
            'image' => [
                'required',
                'mimes:jpeg,png,jpg,gif|max:2048',
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name' => 'Tên sản phẩm không được để trống',
            'describe' => 'Mô tả không được để trống',
            'price.numeric' => 'Giá tiền phải là ký tự số',
            'price.required' => 'Giá tiền không được để trống',
            'total.required' => 'Số lượng không được để trống',
            'total.min' => 'Min = 1',
            'total.numeric' => 'Số lượng phải là ký tự số',
            'image.required' => 'File ảnh không được để trống',
            'image.mimes' => 'File ảnh phải đúng định dạng jpeg,png,jpg,gif'
        ];
    }
}
