<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォームの確認画面</title>
  <link rel="stylesheet" href="{{ asset('/css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/confirm.css') }}">
  {{-- Google Fonts（Inika） --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <header class="header">
    <div class="header-inner">
      <a class="header-logo" href="/">FashionablyLate</a>
    </div>
  </header>

  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>Confirm</h2>
      </div>

      @php
      $genderLabels = [1 => '男性', 2 => '女性', 3 => 'その他'];
      $categoryLabels = [
      1 => '商品のお届けについて',
      2 => '商品の交換について',
      3 => '商品トラブル',
      4 => 'ショップへのお問合せ',
      5 => 'その他',
      ];
      @endphp

      <form class="form" action="{{ route('contact.thanks') }}" method="POST">
        @csrf

        <table class="form-confirm__table">
          <tr class="form-confirm__row">
            <th class="form-confirm__label">お名前</th>
            <td class="form-confirm__value">
              {{ $inputs['last_name'] }} {{ $inputs['first_name'] }}
            </td>
          </tr>
          <tr class="form-confirm__row">
            <th class="form-confirm__label">性別</th>
            <td class="form-confirm__value">
              {{ $genderLabels[$inputs['gender']] ?? '未設定' }}
            </td>
          </tr>
          <tr class="form-confirm__row">
            <th class="form-confirm__label">メールアドレス</th>
            <td class="form-confirm__value">{{ $inputs['email'] }}</td>
          </tr>
          <tr class="form-confirm__row">
            <th class="form-confirm__label">電話番号</th>
            <td class="form-confirm__value">
              {{ $inputs['tel1'] }}{{ $inputs['tel2'] }}{{ $inputs['tel3'] }}
            </td>
          </tr>
          <tr class="form-confirm__row">
            <th class="form-confirm__label">住所</th>
            <td class="form-confirm__value">{{ $inputs['address'] }}</td>
          </tr>
          <tr class="form-confirm__row">
            <th class="form-confirm__label">建物名</th>
            <td class="form-confirm__value">{{ $inputs['building'] }}</td>
          </tr>
          <tr class="form-confirm__row">
            <th class="form-confirm__label">お問い合わせの種類</th>
            <td class="form-confirm__value">{{ $categoryLabels[$inputs['type']] ?? '未設定' }}</td>
          </tr>
          <tr class="form-confirm__row">
            <th class="form-confirm__label">お問い合わせ内容</th>
            <td class="form-confirm__value">{!! nl2br(e($inputs['detail'])) !!}</td>
          </tr>
        </table>

        {{-- Hidden inputs for submission --}}
        <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
        <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">
        <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
        <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        <input type="hidden" name="tel1" value="{{ $inputs['tel1'] }}">
        <input type="hidden" name="tel2" value="{{ $inputs['tel2'] }}">
        <input type="hidden" name="tel3" value="{{ $inputs['tel3'] }}">
        <input type="hidden" name="address" value="{{ $inputs['address'] }}">
        <input type="hidden" name="building" value="{{ $inputs['building'] }}">
        <input type="hidden" name="type" value="{{ $inputs['type'] }}">
        <input type="hidden" name="detail" value="{{ $inputs['detail'] }}">

        <div class="form-confirm__actions">
          <button class="form-confirm__button form-confirm__button--submit" type="submit">送信</button>
          <button class="form-confirm__button form-confirm__button--back" type="submit" name="back" value="back">修正</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>