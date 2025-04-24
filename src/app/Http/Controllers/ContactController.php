<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    // 入力フォーム表示
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    // 確認画面
    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();

        // 万一、カテゴリ名で来た場合に備えて name → id 変換
        if (!is_numeric($inputs['type'])) {
            $category = Category::find($inputs['type']);
            $inputs['type'] = $category ? $category->id : null;
        }

        return view('confirm', compact('inputs'));
    }

    // データ保存 → サンクスページ
    public function store(Request $request)
    {
        // 「修正する」ボタンで戻った場合
        if ($request->input('back') == 'back') {
            return redirect('/')->withInput();
        }

        $contact = new Contact();
        $contact->last_name   = $request->last_name;
        $contact->first_name  = $request->first_name;
        $contact->gender      = $request->gender;
        $contact->email       = $request->email;
        $contact->tel         = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;
        $contact->address     = $request->address;
        $contact->building    = $request->building ?? ''; // nullable対応
        $contact->category_id = $request->type;
        $contact->detail      = $request->detail;
        $contact->save();

        return view('thanks');
    }
}
