<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * ===============================================
     * 【機能概要】
     * - Fortifyを使用し、管理画面にアクセスできる新規ユーザーを作成
     * - バリデーションにはこのフォームリクエスト（RegisterRequest）を使用
     * - ヘッダーの「login」ボタンをクリックするとログインページへ遷移
     * - 「登録」ボタンをクリックした際に、バリデーションエラーがあれば各項目の下にエラーメッセージを表示
     *
     * 【バリデーションルール】
     * - 全てのフォームは入力必須
     * - メールアドレスは「ユーザー名@ドメイン」形式で入力
     *
     * 【エラーメッセージ】
     * - お名前を入力してください
     * - メールアドレスを入力してください
     * - メールアドレスは「ユーザー名@ドメイン」形式で入力してください
     * - パスワードを入力してください
     * - パスワードは8文字以上で入力してください
     * ===============================================
     */

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
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ];
    }

    /**
     * バリデーションエラーメッセージの定義
     */
    public function messages(): array
    {
        return [
            'name.required'     => 'お名前を入力してください',
            'name.string'       => 'お名前は文字列で入力してください',
            'name.max'          => 'お名前は255文字以内で入力してください',
            'email.required'    => 'メールアドレスを入力してください',
            'email.email'       => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'email.unique'      => 'このメールアドレスはすでに登録されています',
            'password.required' => 'パスワードを入力してください',
            'password.string'   => 'パスワードは文字列で入力してください',
            'password.min'      => 'パスワードは8文字以上で入力してください',
        ];
    }
}
