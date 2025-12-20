<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
</head>
<body>
    <div class="thanks__wrapper">
        <div class="thanks__content">
            <div class="thanks__header">
                <h2 class="thanks__header-title">
                お問い合わせありがとうございました
                </h2>
            </div>
            <a class="thanks__button" href="{{ route('contact.index') }}">
            HOME
            </a>
        </div>
    </div>
</body>
</html>