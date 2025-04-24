<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * ユーザーがこのリクエストを行うことを許可するか
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルールの定義
     */
    public function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required|string|min:8',
        ];
    }

    /**
     * バリデーションエラーメッセージの定義
     */
    public function messages(): array
    {
        return [
            'email.required'    => 'メールアドレスを入力してください',
            'email.email'       => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.string'   => 'パスワードは文字列で入力してください',
            'password.min'      => 'パスワードは8文字以上で入力してください',
        ];
    }
}
