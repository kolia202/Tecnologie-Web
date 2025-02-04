document.addEventListener("DOMContentLoaded", function () {
    const cookieBanner = document.getElementById("cookie-banner");

    if (!cookieBanner) {
        return;
    }

    if (localStorage.getItem("cookieAccepted") === "true" || localStorage.getItem("cookieAccepted") === "false") {
        return; 
    }

    cookieBanner.style.display = "block";

    document.getElementById("acceptCookies").addEventListener("click", function () {
        acceptCookies();
    });

    document.getElementById("rejectCookies").addEventListener("click", function () {
        rejectCookies();
    });
});

function acceptCookies() {
    fetch("../php/set_cookie.php", { method: "POST" })  
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                document.getElementById("cookie-banner").style.display = "none";
                localStorage.setItem("cookieAccepted", "true");
            }
        })
        .catch(error => console.error("Errore nell'accettazione dei cookie:", error));
}

function rejectCookies() {
    document.getElementById("cookie-banner").style.display = "none";
    localStorage.setItem("cookieAccepted", "false");
}
