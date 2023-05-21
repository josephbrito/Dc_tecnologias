@extends("layouts.home")
@section("title", "DC Tecnologias - Home")
@section("content")
<main class="main">
    @auth
    <div class="message_auth_container">
        <div class="message_auth_content">
            <h1>Olá {{ auth()->user()->name }}</h1>
            <h2>Confira suas vendas <a href="/dashboard">aqui</a></h2>
        </div>
    </div>
    @endauth
    @guest
    <div class="message_guest_container">
    <div class="message_guest_content">
<h1>Olá, Seja Bem Vindo!</h1>
<h2>Crie sua conta conosco e compartilhe suas vendas e clientes!</h2>
</div>
</div>
    @endguest
</main>
@endsection