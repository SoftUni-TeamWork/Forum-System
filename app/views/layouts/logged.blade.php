<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css"  />
        <title>Team "TAMBA" Forum system</title>
    </head>
    <body>
        <header>
            <ul>
                <li><a href="/user/login">Начало</a></li>
                <li><a href="/user/logout">Изход</a></li>
            </ul>
        </header>
        <section>
            <div>
                @yield('content')
            </div>
        </section>
        <footer>
            <a href="https://softuni.bg">Softuni</a>
        </footer>
    </body>
</html>
