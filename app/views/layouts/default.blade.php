<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!--<link rel="stylesheet" type="text/css" href="style.css" />-->
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title>Team "TAMBA" Forum system</title>
</head>
<body>
<div class="wrapper">
    <header>
        <div class="logo">
            <a href="/">
                <img alt="Team TAMBA Forum system" src="tamba3.png">
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