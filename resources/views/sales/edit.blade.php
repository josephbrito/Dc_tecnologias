@extends("layouts.home")
@section("title", "DC Tecnologias - Editar venda")
@section("content")
<main class="main">
    <div class="form_container">
        <form action="/edit_review" method="POST">
        @csrf
        <div class="client_data">
        <label for="client">Nome do Cliente: </label>
        <input type="text" name="client" id="client" class="client inp" value="{{ $sale->client }}" placeholder="Ex: João Batista" />
        <input type="hidden" name="id" value="{{ $sale->id }}">
        </div>

        <div class="products_data" id="fields">
            @foreach($products as $product)
            <span>Informe os detalhes dos produtos</span>
        <input type="text" id="product" name="product[]" class="product inp" placeholder="Nome do produto" value="{{ $product->product }}" required />
        <input
          type="number"
          class="qtdy_product product inp"
          id="qtdy"
          placeholder="Nova quantidade"
          value="{{ $product->qty }}"
          name="qtdy[]"
          required
        />
        <input
          type="number"
          class="price_product product inp"
          id="price"  
          name="price[]"
          value="{{ $product->price }}"
          placeholder="R$"
          required
        />
        @endforeach
    </div>

    <input id="btn" class="btn" type="submit" value="Enviar" />
        </form>
    </div>
</main>
@endsection