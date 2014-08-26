<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}" type="text/css">
    <title>Team "TAMBA" Forum system</title>
</head>
<body>
<div class="wrapper">
    <header>
        <div class="logo">
            <a href="/">
                {{ HTML::image('imgs/tamba.png', 'Team TAMBA Forum system') }}
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="/">Начало</a></li>
                <li><a href="/user/login">Вход</a></li>
                <li><a href="/user/register">Регистрация</a></li>
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
        <div><a href="https://softuni.bg">Softuni</a></div>
    </footer>
</div>
</body>
</html>