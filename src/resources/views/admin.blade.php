<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理画面 - FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('/css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
  {{-- Google Fonts（Inika） --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <header class="header">
    <div class="header-inner">
      <div class="header-left"></div>
      <div class="header-center">
        <a class="header-logo" href="/">FashionablyLate</a>
      </div>
      <div class="header-right">
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
          @csrf
          <button type="submit" class="header-logout">logout</button>
        </form>
      </div>
    </div>
  </header>

  <main>
    <div class="admin-container">
      <h2 class="admin-title">Admin</h2>

      {{-- 検索フォーム --}}
      <form method="GET" action="{{ route('admin.index') }}" class="admin-search-form">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">

        <select name="gender" class="gender-select">
          <option value="" disabled {{ request('gender') === null || request('gender') === '' ? 'selected' : '' }}>性別</option>
          <option value="all" {{ request('gender') === 'all' ? 'selected' : '' }}>全て</option>
          <option value="1" {{ request('gender') === '1' ? 'selected' : '' }}>男性</option>
          <option value="2" {{ request('gender') === '2' ? 'selected' : '' }}>女性</option>
          <option value="3" {{ request('gender') === '3' ? 'selected' : '' }}>その他</option>
        </select>


        <select name="type" class="type-select">
          <option value="">お問い合わせの種類</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ request('type') == $category->id ? 'selected' : '' }}>
            {{ $category->content }}
          </option>
          @endforeach
        </select>

        <input type="date" name="date" value="{{ request('date') }}" class="date-select">
        <button type="submit">検索</button>
        <a href="{{ route('admin.index') }}" class="reset-btn">リセット</a>
      </form>

      <div class="admin-export-pagination">
        <form action="{{ route('admin.export') }}" method="GET" style="margin: 0;">
          <input type="hidden" name="keyword" value="{{ request('keyword') }}">
          <input type="hidden" name="gender" value="{{ request('gender') }}">
          <input type="hidden" name="type" value="{{ request('type') }}">
          <input type="hidden" name="date" value="{{ request('date') }}">
          <button type="submit" class="export-btn">エクスポート</button>
        </form>
        <div class="pagination-top">
          {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
      </div>


      {{-- テーブル --}}
      <table class="admin-table">
        <thead>
          <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $contact)
          <tr>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>{{ ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact->gender] }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content ?? '-' }}</td>
            <td><button type="button" class="detail-btn" data-id="{{ $contact->id }}">詳細</button></td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{-- モーダル --}}
      <div id="detail-modal" class="modal">
        <div class="modal-content">
          <span class="close-btn">&times;</span>
          <div class="modal-body">
            {{-- Ajaxで詳細をここに読み込み --}}
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>