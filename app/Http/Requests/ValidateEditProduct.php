<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateEditProduct extends FormRequest
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
            'total' => [
                'required',
                'numeric',
                'min:1'
            ],
            'price' => [
                'required',
                'numeric'
            ],
            'describe' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name' => 'Tên sản phẩm không được để trống',
            'total.required' => 'Số lượng không được để trống',
            'total.numeric' => 'Số lượng phải là ký tự số',
            'total.min' => 'Số lượng giới hạn là 1',
            'price.required' => 'Giá tiền không được để trống',
            'price.numeric' => 'Giá tiền phải là ký tự số',
            'describe' => 'Mô tả không được để trống',
            'image' => 'File ảnh phải đúng định dạng jpeg,png,jpg,gif',
        ];
    }
}
