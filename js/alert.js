document.addEventListener("DOMContentLoaded", function() {
    var alertBox = document.getElementById("liveAlertPlaceholder");
    if (alertBox) {
        setTimeout(function() {
            alertBox.innerHTML = "";
        }, 3000); // Nasconde il messaggio dopo 3 secondi
    }
});