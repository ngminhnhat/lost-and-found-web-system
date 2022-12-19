<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_new'=>'required|min:8|confirmed',
            'password_old'=>'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'password_new.required' => 'Vui lòng nhập mật khẩu.',
            'password_new.min' => 'Mật khẩu phải lớn hơn 8 kí tự.',
            'password_new.confirmed' => 'Mật khẩu không trùng khớp.',
            'password_old.required' => 'Vui lòng nhập mật khẩu.',
            'password_old.min' => 'Mật khẩu phải lớn hơn 8 kí tự.',
        ];
    }
}
