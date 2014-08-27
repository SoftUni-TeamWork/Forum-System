<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" type="text/css">
    <title>Team "TAMBA" Forum system</title>
</head>
<body>
<div class="wrapper">
    <header>
        <div class="logo">
            <a href="{{ URL::route('home') }}">
                {{ HTML::image('imgs/tamba.png', 'Team TAMBA Forum system') }}
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="{{ URL::route('home') }}">Начало</a></li>
                @if(Auth::check())
                <li><a href="{{ URL::roude('user-logout') }}">Изход</a></li>
                <li><a href="{{ URL::roude('user-profile') }}">{{{ Auth::user()->username }}}</a></li>
                @else
                <li><a href="{{ URL::route('user-login') }}">Вход</a></li>
                <li><a href="{{ URL::route('user-register') }}">Регистрация</a></li>
                @endif
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <div>
                @yield('content')
            </div>
        </section>
    </main>
    <footer>
        <div>&copy;2014 by Team Tamba at <a href="https://softuni.bg">Softuni</a></div>
    </footer>
</div>
</body>
</html>