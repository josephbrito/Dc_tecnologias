@extends("layouts.home")
@section("title", "DC Tecnologias - Review")
@section("content")
<section class="section">
    <h1>Estamos quase lá para completar a sua venda. Verifique e preencha os dados abaixo:</h1>

    <div class="data_container">
    <form class="form_review" action="/finally" method="POST">
        @csrf
        <div class="client">
        <p>Nome do cliente: <span class="strong_span">{{ $client }}</span></p>
        <input type="hidden" name="client" value="{{ $client }}"  />
        <input type="hidden" name="qtdy" value="{{ array_sum($qtds) }}"  />
        <input type="hidden" name="price" value="{{ array_sum($prices) }}"  />
        </div>
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                @for($pr = 0; $pr < count($products); $pr++)
                <tr>
                    <td>{{ $products[$pr] }}</td>
                    <td>{{ $qtds[$pr] }}</td>
                    <td>R${{ $prices[$pr] }}</td>
                </tr>
                <input type="hidden" name="product[]" value="{{ $products[$pr] }}"  />
                @endfor
            </tbody>
        </table>
       <p>Total de produtos: {{ count($products) }}</p>
       <p>Total de quantidades: {{ array_sum($qtds) }}</p>
       <p>Total da venda R$: {{ array_sum($prices) }}</p>

       <div class="installments">
       <label for="installments">Quantidade de parcelas</label>
       <div class="installments_box">
       <input type="number" id="installments" name="installments" class="inp" min="1" max="12" required />
       <button type="button" id="btn_installments" class="btn">Gerar Parcelas</button>
       </div>
       <div id="result"></div>
       </div>
       <input type="submit" class="btn" value="Finalizar" />
    </form>
    </div>
</section>
<script src="/js/installments.js" defer></script>
@endsection