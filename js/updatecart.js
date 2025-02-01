document.addEventListener("DOMContentLoaded", updateCart);

function updateCart() {
    const increaseButtons = document.querySelectorAll(".increase");
    const decreaseButtons = document.querySelectorAll(".decrease");

    increaseButtons.forEach(b => {
        b.addEventListener("click", function() {
            updateQuantity(this, 1);
        });
    });

    decreaseButtons.forEach(b => {
        b.addEventListener("click", function() {
            updateQuantity(this, -1);
        });
    });

    function updateQuantity(button, update) {
        let currentQuantity = button.parentElement.querySelector(".quantity");
        let productPrice = button.closest('section').querySelector(".product-price");
        let productPoints = button.closest('section').querySelector(".product-points");

        let quantity = parseInt(currentQuantity.innerText);
        let newQuantity = quantity + update;
        if (newQuantity < 1) {
            newQuantity = 1;
            update = 0;
        }
        currentQuantity.innerText = newQuantity;

        let price = parseFloat(productPrice.innerText.replace("Prezzo:", "").replace(",", ".").replace("€", "").trim());
        let newProductPrice = price / quantity * newQuantity;
        productPrice.innerText = "Prezzo: " + newProductPrice.toFixed(2).replace(".", ",") + "€";

        let points = parseInt(productPoints.innerText.replace("Punti:", "").trim());
        let newProductPoints = points / quantity * newQuantity;
        productPoints.innerText = "Punti: " + newProductPoints;

        if (update != 0) {
            updateTotal(price / quantity * update);
        }

        const idprodotto = button.getAttribute("id");

        fetch("../php/aggiorna-carrello.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id: idprodotto,
                quantity: newQuantity
            })
        })

        function updateTotal(newPrice) {
            const totalPrice = document.querySelector(".total-price");
            let total = parseFloat(totalPrice.innerText.replace("Totale Carrello:", "").replace(",", ".").replace("€", "").trim());
            let newTotal = total + newPrice;
            if (newTotal < 0) {
                newTotal = total;
            }
            totalPrice.innerText = "Totale Carrello: " + newTotal.toFixed(2).replace(".", ",") + "€";
        }
    }
}