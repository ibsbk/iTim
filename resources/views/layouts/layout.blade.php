<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/resources/css/app.css">
    
    <title>@yield('title')</title>
</head>
<body>
<header>
    <nav class="nav">
        <div class="left-side">
            <a href="{{route('/')}}" class="big-text">
                iTim
            </a>
        </div>
        <div class="right-side">
            @guest()
                <a href="{{route('auth')}}">войти</a>
                <a href="{{route('reg')}}">зарегистрироваться</a>
            @endguest
            @auth()
                @if (Auth::user()->isAdmin == 1)
                    <span class="rs-item"><a href="{{route('adminLk')}}">админ-панель</a></span>
                @endif
                <span class="rs-item"><a href="{{route('allFilms')}}">все фильмы</a></span>
                <span class="rs-item"><a href="{{route('logout')}}">выйти</a></span>
            @endauth
        </div>
    </nav>
</header>
<section>
    <div class="content-wrapper">
        @yield('content')
    </div>
</section>
@yield('script')
</body>
</html>
