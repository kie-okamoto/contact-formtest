<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * このリクエストをユーザーが使用できるかどうかを判定
     */
    public function authorize()
    {
        return true;
    }

    /**
     * バリデーションルール
     */
    public function rules(): array
    {
        return [
            'last_name'  => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender'     => 'required|in:1,2,3',
            'email'      => 'required|email',
            'tel1'       => 'required|digits_between:1,5|numeric',
            'tel2'       => 'required|digits_between:1,5|numeric',
            'tel3'       => 'required|digits_between:1,5|numeric',
            'address'    => 'required|string|max:255',
            'building'   => 'nullable|string|max:255',
            'type'       => 'required|in:1,2,3,4,5',
            'detail'     => 'required|string|max:120',
        ];
    }

    /**
     * バリデーションメッセージ
     */
    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',

            // 電話番号（まとめて1つのエラー文）
            'tel1.required' => '電話番号を入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel3.required' => '電話番号を入力してください',
            'tel1.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel2.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel3.digits_between' => '電話番号は5桁までの数字で入力してください',

            'address.required' => '住所を入力してください',
            'type.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
