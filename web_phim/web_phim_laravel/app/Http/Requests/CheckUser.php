<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckUser extends FormRequest
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
            'user' => 'required|min:6',
            'password' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'user.required' => 'Tên tài khoản bắt buộc',
            'user.min' => 'Tên tài khoản không nhỏ hơn 6 ký tự',
            'password.required' => 'Mật khẩu bắt buộc'
        ];
    }
}
