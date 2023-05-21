<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <title>@yield('title')</title>
</head>
<body>
    <header class="header">
    <div class="logo">
        <a href="/">
        <img src="/assets/logo.png" alt="logo DC" />
        </a>
    </div>

    <nav class="navbar">
        @guest
        <a href="/register">Criar conta</a>
        <a href="/login">Entrar</a>
        @endguest
        @auth
        <a href="/dashboard">Minhas vendas</a>
        <a href="/create_sale">Criar uma venda</a>
        @endauth
    </nav>
</header>
@if(session("msg_error"))
<div class="error">
    <span>{{ session("msg_error") }}</span>
</div>
@endif

@if(session("msg_success"))
<div class="success">
    <span>{{ session("msg_success") }}</span>
</div>
@endif
    @yield('content')

    <footer class="footer">
        <a href="https://github.com/josephbrito/Dc_tecnologias">&copy; José de Brito</a>
    </footer>
</body>
</html>