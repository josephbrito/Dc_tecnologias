@extends("layouts.home")
@section("title", "DC Tecnologias - Review de edição de venda")
@section("content")
<section class="section">
    <h1>Estamos quase lá para completar a sua venda. Verifique e preencha os dados abaixo:</h1>

    <div class="data_container">
    <form class="form_review" action="/update_sale/{{ $id }}" method="POST">
        @csrf
        @method("PUT")
        <div class="client">
        <p>Nome do cliente: <span class="strong_span">{{ $client }}</span></p>
        <input type="hidden" name="id_sale" value="{{ $id }}"  />
        <input type="hidden" name="client" value="{{ $client }}"  />
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
                <input type="hidden" name="qtdy[]" value="{{ $qtds[$pr] }}"  />
                <input type="hidden" name="price[]" value="{{ $prices[$pr] }}"  />
                @endfor

                @foreach($previousProducts as $previous)
                <input type="hidden" name="previousProduct[]" value="{{ $previous->product }}" />
                @endforeach
            </tbody>
        </table>
       <p>Total de produtos: {{ count($products) }}</p>
       <p>Total de quantidades: {{ array_sum($qtds) }}</p>
       <p>Total da venda R$: {{ array_sum($prices) }}</p>

       <div class="installments">
       <label for="installments">Quantidade de parcelas</label>
       <div class="installments_box">
       <input type="number" id="installments" name="installments" class="inp" min="1" max="12" value="{{ $installments }}" required />
       <button type="button" id="btn_installments" class="btn">Gerar Parcelas</button>
       </div>
       <div id="result">
        @for($i = 0; $i < $installments; $i++)
        <div class="installments_inputs_container">
            <input type="date" name="date[]" id="inp_date" class="inp_date inp inp_installments" value="{{ $dates[$i] }}" required />
            <input type="number" name="price_installments[]" id="inp_value" class="inp_value inp inp_installments" placeholder="R$" value="{{ $price_installments[$i] }}" required />
            <input type="text" name="observations[]" id="inp_obs" class="inp_obs inp inp_installments" value="{{ $observations[$i] }}" placeholder="Observações" />
        </div>
        @endfor
       </div>
       </div>
       <input type="submit" class="btn" value="Finalizar" />
    </form>
    </div>
</section>
<script src="/js/installments.js" defer></script>
@endsection