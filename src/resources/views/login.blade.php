<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
  <link rel="stylesheet" href="{{ asset('/css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
  {{-- Google Fonts（Inika） --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <header class="header">
    <div class="header-inner">
      <div class="header-left"></div> <!-- 左スペース（空でもOK） -->
      <div class="header-center">
        <a class="header-logo" href="/">FashionablyLate</a>
      </div>
      <div class="header-right">
        <a class="header-register" href="{{ route('register') }}">register</a>
      </div>
    </div>
  </header>


  <main>
    <div class="login-form__heading">
      <h2>Login</h2>
    </div>
    <div class="login-form__content">

      <form class="form" action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form__group">
          <label for="email" class="form__label">メールアドレス</label>
          <input type="text" name="email" id="email" placeholder="例：test@example.com" value="{{ old('email') }}">
          @error('email')
          <div class="form__error">{{ $message }}</div>
          @enderror
        </div>

        <div class="form__group">
          <label for="password" class="form__label">パスワード</label>
          <input type="password" name="password" id="password" placeholder="例：coachtech1106">
          @error('password')
          <div class="form__error">{{ $message }}</div>
          @enderror
        </div>

        <div class="form__button">
          <button type="submit">ログイン</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>