<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('/css/sanitize.css') }}">
  {{-- Google Fonts（Inika） --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
  @yield('css')

  <style>
    body {
      font-family: 'Inika', serif;
      background-color: white;
      color: #4e3e2f;
      margin: 0;
      padding: 0;
    }

    /* ヘッダー全体 */
    .header {
      width: 100%;
      height: 100px;
      background-color: white;
      border-bottom: 1px solid #E0DFDE;
      position: relative;
    }

    /* ロゴを中央に絶対配置 */
    .header-logo {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      font-size: 40px;
      color: #4e3e2f;
      text-decoration: none;
    }

    /* ログアウト or register ボタンの共通スタイル */
    .header-action {
      position: absolute;
      right: 32px;
      top: 50%;
      transform: translateY(-50%);
    }

    .header-logout,
    .header-register {
      font-size: 14px;
      color: #b9a79d;
      background: none;
      border: 1px solid #b9a79d;
      padding: 4px 12px;
      border-radius: 3px;
      cursor: pointer;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <header class="header">
    <!-- ロゴを中央に表示 -->
    <a class="header-logo" href="/">FashionablyLate</a>

    <!-- 右上のログアウト or registerボタン -->
    <div class="header-action">
      @auth
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="header-logout">logout</button>
      </form>
      @else
      <a href="{{ route('register') }}" class="header-register">register</a>
      @endauth
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  @yield('js')
</body>

</html>