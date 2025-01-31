<?php

function getFormattedPrice($price) {
    return number_format($price, 2, ',', '.') . '€';
}

function isUserLoggedIn() {
    return isset($_SESSION['utente']);
}

?>