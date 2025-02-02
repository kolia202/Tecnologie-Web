<?php

function getFormattedPrice($price) {
    return number_format($price, 2, ',', '.') . '€';
}

function isUserLoggedIn() {
    return isset($_SESSION['utente']);
}

function getFormattedDate($data) {
    return DateTime::createFromFormat('Y-m-d', $data)->format('d-m-Y');
}

?>