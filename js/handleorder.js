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

    const carta = document.querySelector(".carta-radio");
    const punti = document.querySelector(".punti-radio");

    if (carta && punti) {
        const sezioneCarta = document.querySelector('.sezioneCarta');
        const sezionePunti = document.querySelector('.sezionePunti');
        carta.addEventListener("change", function() {
            if (carta.checked) {
                sezioneCarta.classList.remove("d-none");
                sezionePunti.classList.add("d-none");
                document.querySelectorAll('.sezioneCarta input').forEach(input => input.required = true);
            }       
        })
        
        punti.addEventListener("change", function() {
            if (punti.checked) {
                sezioneCarta.classList.add("d-none");
                sezionePunti.classList.remove("d-none");
                document.querySelectorAll('.sezioneCarta input').forEach(input => input.required = false);
            }
        })
    }

    const pagaPunti = document.querySelector(".paga-punti");
    if(pagaPunti) {
        pagaPunti.addEventListener("click", function() {
            let puntiUtente = document.querySelector(".punti-utente").innerText.replace('Punti:', '').trim();
            let costoSpedizione = parseFloat(document.querySelector(".costo-spedizione").innerText.replace("Spedizione:", "").replace('Gratuita', '0,00€').replace(',', '.').replace('€', '').trim());
            let selectProdotto = document.getElementById('selezionaprodotto');
            if (selectProdotto.selectedIndex <= 0) {
                document.querySelector('.errore-selezione').style.display = "block";
                return;
            }
            let totalePunti = parseInt(selectProdotto.options[selectProdotto.selectedIndex].dataset.punti);
            let prezzoPeluche = parseFloat(selectProdotto.options[selectProdotto.selectedIndex].dataset.prezzo);
    
            if(parseInt(puntiUtente) >= parseInt(totalePunti)) {
                document.querySelector('.errore-selezione').style.display = "none";
                document.querySelector(".errore-punti").style.display = 'none';

                puntiUtente = puntiUtente - totalePunti;
                document.querySelector(".punti-utente").innerText = 'Punti: ' + puntiUtente;
                let totaleCarrello = parseFloat(document.querySelector(".totale-carrello").innerText.replace('Subtotale:', '').replace('€', '').replace(',', '.').trim());
                let nuovoTotale = totaleCarrello - prezzoPeluche;
                document.querySelector('.nuovo-tot').value = nuovoTotale;
                document.querySelector(".totale-carrello").innerHTML = "<strong>Subtotale:</strong> " + nuovoTotale.toFixed(2).replace('.', ',') + "€";
                let totaleFinale = nuovoTotale + costoSpedizione;
                document.querySelector(".totale-finale").innerText = "Totale: " + totaleFinale.toFixed(2).replace('.', ',') + '€';
                document.querySelector(".usa-punti").value = 1;
                document.querySelector('.prezzo-punti').value = parseInt(document.querySelector('.prezzo-punti').value) + totalePunti;

                selectProdotto.remove(selectProdotto.selectedIndex);
                selectProdotto.selectedIndex = 0;
            } else {
                document.querySelector('.errore-selezione').style.display = "none";
                document.querySelector(".errore-punti").style.display = 'block';                        
            }
        });
    }

    const form = document.querySelector(".cont-payment form");
    if (form) {
        form.addEventListener("submit", function(e) {
            const totaleFinale = parseFloat(document.querySelector(".totale-finale").innerText.replace("Totale:", "").replace("€", "").replace(",", ".").trim());
            if (punti.checked && totaleFinale > 0) {
                e.preventDefault();
                document.querySelector('.errore-pagamento').style.display = 'block';
            }
        });
    }

}