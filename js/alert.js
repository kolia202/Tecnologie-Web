document.addEventListener("DOMContentLoaded", function() {
    var alertBox = document.getElementById("liveAlert");
    if (alertBox) {
        setTimeout(function() {
            alertBox.innerHTML = "";
        }, 5000);
    }
});