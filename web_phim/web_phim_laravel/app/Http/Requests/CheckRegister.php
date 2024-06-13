<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckRegister extends FormRequest
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
            'user' => 'required|min:6|unique:account,user',
            'password' => 'required',
            'passwordAgain' => 'required',
            'email' => 'required|unique:account,email'
        ];
    }
    public function messages(): array
    {
        return [
            'user.required' => 'Tên tài khoản bắt buộc',
            'user.min' => 'Tên tài khoản không nhỏ hơn 6 ký tự',
            'user.unique' => 'Tên tài khoản đã có trên hệ thống, vui lòng thử lại',
            'password.required' => 'Mật khẩu bắt buộc',
            'passwordAgain.required' => 'Mật khẩu bắt buộc',
            'email.required' => 'Email bắt buộc',
            'email.unique' => 'Email đã có trên hệ thống, vui lòng thử lại'
        ];
    }
}
