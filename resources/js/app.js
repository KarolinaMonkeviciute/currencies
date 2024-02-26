import "./bootstrap";
import jQuery from "jquery";
window.$ = jQuery;

let selectedCurrency;

if (document.querySelector("[data-select-currency]")) {
    const currencySelect = document.querySelector("[data-select-currency]");

    currencySelect.addEventListener("change", (e) => {
        selectedCurrency = e.target.value;
        window.location.href =
            window.location.pathname +
            "?" +
            $.param({ currency: selectedCurrency });
    });
}
