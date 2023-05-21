@extends("layouts.home")
@section("title", "DC Tecnologias - Criar")
@section("content")
<main class="main">
    <div class="form_container">
        <form action="/sale_review" method="POST">
        @csrf
        <div class="client_data">
        <label for="client">Nome do Cliente: </label>
        <input type="text" name="client" id="client" class="client inp" placeholder="Ex: João Batista" />
        </div>

        <div class="products_data" id="fields">
            <span>Informe os detalhes dos produtos</span>
        <input type="text" id="product" name="product[]" class="product inp" placeholder="Nome do produto" required />
        <input
          type="number"
          class="qtdy_product product inp"
          id="qtdy"
          placeholder="Quantidade"
          name="qtdy[]"
          required
        />
        <input
          type="number"
          class="price_product product inp"
          id="price"
          name="price[]"
          placeholder="R$"
          required
        />
        
    </div>
    <i id="more" class="bi bi-plus-square"></i>

    <input id="btn" class="btn" type="submit" value="Enviar" />
        </form>
    </div>
</main>
<script src="/js/script.js" defer ></script>
@endsection