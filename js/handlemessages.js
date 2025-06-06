document.addEventListener("DOMContentLoaded", handleMessages);

function handleMessages() {

    document.querySelectorAll(".leggi-notifica").forEach(b => {
        b.addEventListener("click", function() {
            let cardbody = b.closest(".card-body");
            cardbody.querySelector(".messaggio-notifica").style.display = "block";
            cardbody.querySelector(".elimina-notifica").style.display = "block";
            b.style.display = "none";        
            cardbody.querySelector(".chiudi-notifica").style.display = "block";

            let statonotifica = cardbody.querySelector(".stato-notifica").value;
            if (statonotifica == 0) {
                let idnotifica = cardbody.querySelector(".elimina-notifica").value;
                cardbody.querySelector(".nuova-notifica").style.backgroundColor = "green";
                cardbody.querySelector(".nuova-notifica").style.opacity = "0.7";
                cardbody.querySelector(".nuova-notifica").innerText = "Letta";
                fetch('../php/stato-notifica.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        id: idnotifica,
                    })
                })
            }
        })
    })

    document.querySelectorAll(".chiudi-notifica").forEach(b => {
        b.addEventListener("click", function() {
            let cardbody = b.closest(".card-body");
            cardbody.querySelector(".messaggio-notifica").style.display = "none";
            cardbody.querySelector(".elimina-notifica").style.display = "none";
            b.style.display = "none";
            cardbody.querySelector(".leggi-notifica").style.display = "block";
        })
    })

}
