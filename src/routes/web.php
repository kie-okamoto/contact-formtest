<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// ▼ お問い合わせフォーム入力ページ
Route::get('/', [ContactController::class, 'index'])->name('contact.index');

// ▼ 確認ページ
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

// ▼ サンクスページ
Route::post('/thanks', [ContactController::class, 'store'])->name('contact.thanks');

// ▼ 管理画面
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');

// ▼ CSVエクスポート
Route::get('/admin/export', [AdminController::class, 'export'])->middleware('auth')->name('admin.export');

// ▼ ユーザー登録ページ
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// ▼ ログインページ
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// ▼ ログアウト処理
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ▼ modalでの詳細表示
Route::get('/admin/contact/{id}', [AdminController::class, 'show'])->middleware('auth');

//modalでの削除
Route::delete('/admin/contact/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
