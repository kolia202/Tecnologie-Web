document.addEventListener("DOMContentLoaded", handleOrder);

function handleOrder() {

    document.querySelectorAll(".shipping-radio").forEach(b => {
        b.addEventListener("change", function() {
            const idspedizione = this.getAttribute("id");
            const subtotal = parseFloat(document.querySelector(".subtotale").innerText.replace("Subtotale:", "").replace(",", ".").replace("€", "").trim());
            let shippingPrice = parseFloat(document.querySelector(".shipping-price" + idspedizione).innerText.replace("Prezzo:", "").replace(",", ".").replace("€", "").trim());
            
            document.querySelector(".shipping-cost").innerHTML = "<strong>Spedizione:</strong> " + shippingPrice.toFixed(2).replace(".", ",") + "€";

            let total = subtotal + shippingPrice;

            document.querySelector(".totale").innerText = "Totale: " + total.toFixed(2).replace(".", ",") + "€";
        });
    });

    const pagaPunti = document.querySelector(".paga-punti");
    if(pagaPunti) {
        pagaPunti.addEventListener("click", function() {
            let puntiUtente = document.querySelector(".punti-utente").innerText.trim();
            let costoSpedizione = document.querySelector(".costo-spedizione").innerText.replace("Spedizione:", "").trim();
            let totalePunti = document.querySelector(".totale-punti").innerText.replace("Per questo ordine sono necessari", "").replace("punti", "").trim();
            let errorePunti = document.querySelector(".errore-punti");
    
            if(parseInt(puntiUtente) >= parseInt(totalePunti)) {
                document.querySelector(".totale-carrello").innerText = "Carrello: 0,00€";
                document.querySelector(".totale-finale").innerText = "Totale: " + costoSpedizione;
                document.querySelector(".usa-punti").value = 1;
                errorePunti.innerText = "Congratulazioni! Hai abbastanza punti per completare l'acquisto!";
                errorePunti.style.color = "green";
                errorePunti.style.display = "block";
                if(costoSpedizione == '0,00€') {
                    document.querySelectorAll(".payment-radio").forEach(b => {
                        b.disabled = true;
                    })
                }
            } else {
                errorePunti.innerText = "Non hai abbastanza punti per questo ordine!";
                errorePunti.style.color = "red";
                errorePunti.style.display = "block";                        
            }
        });
    }

}