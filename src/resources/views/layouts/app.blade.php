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
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__content">
                <div class="header__left"></div>
                <a class="header__logo" href="/">FashionablyLate</a>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <form class="header-nav__form" action="/register" method="post">
                                @csrf
                                <button class="header-nav__button">register</button>
                            </form>
                        </li>
                        <li class="header-nav__item">
                            <form class="header-nav__form" action="/login" method="post">
                                @csrf
                                <button class="header-nav__button">login</button>
                            </form>
                        </li>
                        <li class="header-nav__item">
                            <form class="header-nav__form" action="/logout" method="post">
                                @csrf
                                <button class="header-nav__button">logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
    @yield('content')
    </main>
</body>
</html>