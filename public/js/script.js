const more = document.getElementById("more");
const fields = document.getElementById("fields");
const btn = document.getElementById("btn");

const inputsProduct = document.querySelectorAll(".product");

btn.addEventListener("click", () => {
    inputsProduct.forEach((e) => {
        if (!e.value) {
            alert("Por favor preencha todos os campos");
            return;
        }
    });
});

more.addEventListener("click", () => {
    fields.insertAdjacentHTML(
        "beforeend",
        `
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
`
    );
});
