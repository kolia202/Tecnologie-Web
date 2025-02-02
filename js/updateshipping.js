document.addEventListener("DOMContentLoaded", handleShipping);

function handleShipping() {

    document.querySelectorAll(".shipping-radio").forEach(b => {
        b.addEventListener("change", function() {
            const idspedizione = this.getAttribute("id");
            const subtotal = parseFloat(document.querySelector(".subtotale").innerHTML.replace("Subtotale:", "").replace(",", ".").replace("€", "").trim());
            let shippingPrice = parseFloat(document.querySelector(".shipping-price" + idspedizione).innerText.replace("Prezzo:", "").replace(",", ".").replace("€", "").trim());
            
            document.querySelector(".shipping-cost").innerText = "Spedizione: " + shippingPrice.toFixed(2).replace(".", ",") + "€";

            let total = subtotal + shippingPrice;

            document.querySelector(".totale").innerText = "Totale: " + total.toFixed(2).replace(".", ",") + "€";
        });
    });

}