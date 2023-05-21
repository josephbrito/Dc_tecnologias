@extends("layouts.home")
@section("title", "DC Tecnologias - Minhas vendas")
@section("content")
<main class="main">
@if(count($sales) > 0)
<h1 class="msg">Confira suas vendas!</h1>
<div class="sales_container">
@foreach($sales as $sale)
<div class="card">
    <div class="card_header">
    <p>Cliente:<span class="strong_span">{{ $sale->client }}</span></p>
    </div>
    <div class="card_body">
        <p><span class="strong_span">Produtos vendidos:</span></p>
        <ul>
            @foreach($sale->products as $product)
            <li>{{ $product }}</li>
            @endforeach
        </ul>
        <p><span class="strong_span">Total de quantidades vendidas:</span> {{ $sale->qtd }}</p>
        <p><span class="strong_span">Numero de parcelas:</span> {{ $sale->installments }}</p>
        <p><span class="strong_span">Renda faturada:</span> R${{ $sale->price }}</p>
    </div>
    <div class="line"></div>
    <div class="card_footer">
        <form action="/delete_sale/{{$sale->id}}" class="form_delete_sale" method="POST">
            @csrf
            @method("DELETE")
            <input type="submit" id="btn_del" class="btn_del" value="Deletar venda" />
        </form>
        <a href="/edit_sale/{{$sale->id}}" id="btn_up" class="btn_up">
            <span>Atualizar venda</span>
        </a>
    </div>
</div>
@endforeach
</div>
@else
<div class="no_sales">
<p>Sem vendas ainda.</p>
</div>
@endif
</main>
<script src="/js/dashboard.js"></script>
@endsection