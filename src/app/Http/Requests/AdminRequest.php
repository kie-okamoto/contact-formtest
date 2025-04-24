<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'keyword' => 'nullable|string|max:255',
            'gender'  => 'nullable|in:1,2,3,all',
            'type'    => 'nullable|integer|exists:categories,id',
            'date'    => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'keyword.string' => 'キーワードは文字列で入力してください。',
            'gender.in'      => '性別の値が不正です。',
            'type.exists'    => '選択したお問い合わせの種類が存在しません。',
            'date.date'      => '日付の形式が不正です。',
        ];
    }
}
