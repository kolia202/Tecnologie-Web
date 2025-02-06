<?php
require_once("bootstrap.php");

session_start();

$templateParams["titolo"] = "Mondo Morbidoso - Assistenza Clienti";
$templateParams["nome"] = "assistenzaC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}

if(isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['successo'] = 'Messaggio inviato con successo!';
    header("Location: assistenza.php");
    exit;
}

require("../template/base.php");
?>