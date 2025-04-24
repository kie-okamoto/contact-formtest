<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録</title>
  <link rel="stylesheet" href="{{ asset('/css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/register.css') }}">
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
        <a class="header-login" href="{{ route('login') }}">login</a>
      </div>
    </div>
  </header>

  <main>
    <div class="register-form__heading">
      <h2>Register</h2>
    </div>
    <div class="register-form__content">

      <form class="form" action="{{ route('register') }}" method="POST">
        @csrf

        <div class="register-form__group">
          <label for="name" class="register-form__label">お名前</label>
          <input type="text" name="name" id="name" class="register-form__input" placeholder="例：山田 太郎" value="{{ old('name') }}">
          @error('name')
          <div class="register-form__error">{{ $message }}</div>
          @enderror
        </div>


        <div class="register-form__group">
          <label for="email" class="register-form__label">メールアドレス</label>
          <input type="text" name="email" id="email" class="register-form__input" placeholder="例：test@example.com" value="{{ old('email') }}">
          @error('email')
          <div class="register-form__error">{{ $message }}</div>
          @enderror
        </div>

        <div class="register-form__group">
          <label for="password" class="register-form__label">パスワード</label>
          <input type="password" name="password" id="password" class="register-form__input" placeholder="例：coachtech1106">
          @error('password')
          <div class="register-form__error">{{ $message }}</div>
          @enderror
        </div>

        <div class="register-form__button">
          <button type="submit">登録</button>
        </div>

      </form>
    </div>
  </main>
</body>

</html>