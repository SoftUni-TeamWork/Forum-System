<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Forum system</title>
    <style>
        li {
            border-radius: 10px;

            display: inline-block;
            width: 140px;
            padding: 3px;
            background-color: #616161;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: white;
            width: 100%;
            display: inline-block;
        }

        label {
            width: 140px;
            display: inline-block;
        }

        section div:first-of-type {
            width: 500px;
            text-align: left;

        }
        footer a{
            color: blue;
            text-decoration: underline;
            
        }
        footer div:first-of-type{
            width: 100px;
        }
        
    </style>
</head>
<body>
<header>
    <ul>
        <li><a href="/">Начало</a></li>
        <li><a href="/user/register">Регистрация</a></li>
        <li><a href="/user/login">Вход в системата</a></li>
    </ul>
</header>
<section>
    <div>
        @yield('content')
    </div>
</section>
<footer>
    <div><a href="https://softuni.bg">Softuni</a></div>
</footer>
</body>
</html>