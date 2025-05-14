<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Informazioni";
$templateParams["nome"] = "informazioniC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;
if(isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}


require("../template/base.php");
?>