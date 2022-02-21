<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta-description')">
    <title>@yield('meta-title')</title>
    <link rel="shortcut icon" href="{{ url('img/favicon.png') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css')  }}">
</head>
<body>
    <div class="container">
        <header class="header">
            <a class="logo" href="{{ route('user.home') }}"><img src="{{ url('img/logo.svg') }}" alt="логотип"></a>
            <div class="btn-group">
                @yield('header-content')
            </div>
        </header>
        <main class="main">
            <div class="main__heading">
                <h1>@yield('title')</h1>
            </div>
            <div class="main__content">
                @yield('content')
            </div>
        </main>
        <footer class="footer">© Все права защищены, ну кроме наших прав на этот проект</footer>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
