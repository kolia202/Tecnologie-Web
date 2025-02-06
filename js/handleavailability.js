document.addEventListener("DOMContentLoaded", handleAvailability);

function handleAvailability() {

    const avvisoDisponibilita = document.querySelector(".avviso-disponibilita");
    if(avvisoDisponibilita) {
        avvisoDisponibilita.addEventListener("submit", function(event) {
            event.preventDefault();
    
            const email = document.querySelector(".id-utente").value;
            const idprodotto = document.querySelector(".id-prodotto").value;
    
            fetch('../php/invia-richiesta.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    utente: email,
                    idprodotto: idprodotto,
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.status == "success") {
                    const button = document.querySelector(".btn-avviso");
                    button.classList.add('btn-avviso', 'fw-bold');
                    button.innerText = 'Richiesta inviata';
                    button.disabled = true;
                }
            })
            .catch(error => {
                console.error("Errore: ", error);
            });
        })
    }
}
