const btn_del = document.querySelectorAll(".btn_del");

btn_del.forEach((button) => {
    button.addEventListener("click", (e) => {
        let isContinue = confirm("Deseja realmente apagar sua venda?");

        if (!isContinue) {
            e.preventDefault();
            return;
        }
    });
});
