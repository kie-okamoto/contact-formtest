<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="{{ asset('/css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
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
    <div class="main-container">
      <div class="contact-form__content">
        <div class="contact-form__heading">
          <h2>Contact</h2>
        </div>

        <form class="form" action="{{ route('contact.confirm') }}" method="POST">
          @csrf

          {{-- お名前 --}}
          <div class="form__group">
            <div class="form__label">
              お名前 <span class="form__label--required">※</span>
            </div>
            <div class="form__input name-inputs">
              <div style="flex: 1;">
                <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
                @error('last_name')
                <div class="form__error">{{ $message }}</div>
                @enderror
              </div>
              <div style="flex: 1;">
                <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
                @error('first_name')
                <div class="form__error">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>



          {{-- 性別 --}}
          <div class="form__group">
            <div class="form__label">
              性別 <span class="form__label--required">※</span>
            </div>
            <div class="form__input form__radio-group">
              <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}> 男性</label>
              <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}> 女性</label>
              <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}> その他</label>
              @error('gender')
              <div class="form__error">{{ $message }}</div>
              @enderror
            </div>
          </div>

          {{-- メールアドレス --}}
          <div class="form__group">
            <div class="form__label">
              メールアドレス <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
              <input type="text" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
              @error('email')
              <div class="form__error">{{ $message }}</div>
              @enderror
            </div>
          </div>

          {{-- 電話番号 --}}
          <div class="form__group">
            <div class="form__label">
              電話番号 <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
              <div class="tel-inputs">
                <input type="text" name="tel1" maxlength="5" placeholder="080" value="{{ old('tel1') }}">
                <span class="hyphen">-</span>
                <input type="text" name="tel2" maxlength="5" placeholder="1234" value="{{ old('tel2') }}">
                <span class="hyphen">-</span>
                <input type="text" name="tel3" maxlength="5" placeholder="5678" value="{{ old('tel3') }}">
              </div>

              @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
              <div class="form__error">
                {{ $errors->first('tel1') ?? $errors->first('tel2') ?? $errors->first('tel3') }}
              </div>
              @endif
            </div>
          </div>



          {{-- 住所 --}}
          <div class="form__group">
            <div class="form__label">
              住所 <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
              <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
              @error('address')
              <div class="form__error">{{ $message }}</div>
              @enderror
            </div>
          </div>

          {{-- 建物名 --}}
          <div class="form__group">
            <div class="form__label">建物名</div>
            <div class="form__input">
              <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>
          </div>

          {{-- お問い合わせの種類 --}}
          <div class="form__group">
            <div class="form__label">
              お問い合わせの種類 <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
              <div class="form__input--select">
                <select name="type">
                  <option value="">選択してください</option>
                  <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>1.商品のお届けについて</option>
                  <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>2.商品の交換について</option>
                  <option value="3" {{ old('type') == '3' ? 'selected' : '' }}>3.商品トラブル</option>
                  <option value="4" {{ old('type') == '4' ? 'selected' : '' }}>4.ショップへのお問合せ</option>
                  <option value="5" {{ old('type') == '5' ? 'selected' : '' }}>5.その他</option>
                </select>
              </div>
              @error('type')
              <div class="form__error">{{ $message }}</div>
              @enderror
            </div>
          </div>


          {{-- お問い合わせ内容 --}}
          <div class="form__group">
            <div class="form__label">
              お問い合わせ内容 <span class="form__label--required">※</span>
            </div>
            <div class="form__input">
              <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
              @error('detail')
              <div class="form__error">{{ $message }}</div>
              @enderror
            </div>
          </div>

          {{-- 確認ボタン --}}
          <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>

</html>