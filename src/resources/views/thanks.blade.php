<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>サンクスページ</title>
  <link rel="stylesheet" href="{{ asset('/css/thanks.css') }}">
  {{-- Google Fonts（Inika） --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="thanks-container">
    <div class="thanks-message">
      <p>お問い合わせありがとうございました</p>
      <a href="{{ route('contact.index') }}" class="thanks-button">HOME</a>
    </div>
    <div class="thanks-background-text">Thank you</div>
  </div>
</body>

</html>