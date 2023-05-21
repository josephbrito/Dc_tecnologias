const number_of_installments = document.getElementById("installments");
const button_of_installments = document.getElementById("btn_installments");
const result = document.getElementById("result");

const div_installments = `<div class="installments_inputs_container">
    <input type="date" id="inp_date" class="inp_date inp inp_installments" required />
    <input type="number" id="inp_value" class="inp_value inp inp_installments" placeholder="R$" required />
    <input type="text" id="inp_obs" class="inp_obs inp inp_installments" placeholder="Observações" />
</div>`;

button_of_installments.addEventListener("click", () => {
    switch (Number(number_of_installments.value)) {
        case 1:
            result.replaceChildren();
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 2:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 3:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 4:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 5:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 6:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 7:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 8:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 9:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 10:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 11:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        case 12:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);
            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
        default:
            result.replaceChildren();

            result.insertAdjacentHTML("afterbegin", div_installments);

            break;
    }
});
