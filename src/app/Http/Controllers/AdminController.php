<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index(AdminRequest $request)
    {
        $query = Contact::with('category');

        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $keyword = $request->keyword;

                $q->where('first_name', 'like', "%{$keyword}%")
                    ->orWhere('last_name', 'like', "%{$keyword}%")
                    ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('type')) {
            $query->where('category_id', $request->type);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function export(AdminRequest $request)
    {
        $contacts = Contact::query();

        if ($request->filled('keyword')) {
            $contacts->where(function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->keyword}%")
                    ->orWhere('last_name', 'like', "%{$request->keyword}%")
                    ->orWhere('email', 'like', "%{$request->keyword}%");
            });
        }

        if ($request->filled('gender') && $request->gender !== 'all') {
            $contacts->where('gender', $request->gender);
        }

        if ($request->filled('type')) {
            $contacts->where('category_id', $request->type);
        }

        if ($request->filled('date')) {
            $contacts->whereDate('created_at', $request->date);
        }

        $filename = 'contacts_' . now()->format('Ymd_His') . '.csv';
        $headers = ['Content-Type' => 'text/csv'];

        $callback = function () use ($contacts) {
            $file = fopen('php://output', 'w');

            // Shift-JIS形式で出力するため、1行ずつ変換して書き込む
            $header = ['名前', '性別', 'メール', '種類', '日付'];
            fwrite($file, mb_convert_encoding(implode(',', $header) . "\n", 'SJIS-win', 'UTF-8'));

            foreach ($contacts->get() as $contact) {
                $row = [
                    $contact->last_name . ' ' . $contact->first_name,
                    ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact->gender],
                    $contact->email,
                    $contact->category->content ?? '-',
                    $contact->created_at,
                ];

                fwrite($file, mb_convert_encoding(implode(',', $row) . "\n", 'SJIS-win', 'UTF-8'));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers + [
            'Content-Disposition' => "attachment; filename=$filename",
        ]);
    }


    public function show($id)
    {
        $contact = Contact::with('category')->findOrFail($id);

        // 電話番号のハイフンを削除
        $contact->tel = str_replace('-', '', $contact->tel);

        // 郵便番号を柔軟に削除
        $contact->address = preg_replace('/〒?\d{3}-?\d{4}[ 　]*/u', '', $contact->address);

        return view('admin.modal', compact('contact'));
    }




    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.index')->with('message', 'データを削除しました。');
    }
}
