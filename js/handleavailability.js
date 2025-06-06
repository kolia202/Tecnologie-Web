document.addEventListener("DOMContentLoaded", handleAvailability);

function handleAvailability() {

    const avvisoDisponibilita = document.querySelector(".avviso-disponibilita");
    if(avvisoDisponibilita) {
        const button = avvisoDisponibilita.querySelector(".btn-avviso")
        button.addEventListener("click", () => {    
            const email = avvisoDisponibilita.dataset.utente;
            const idprodotto = avvisoDisponibilita.dataset.prodotto;
    
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
