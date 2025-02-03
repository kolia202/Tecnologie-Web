<?php
require_once("bootstrap.php");

session_start();

$templateParams["titolo"] = "Mondo Morbidoso - Assistenza Clienti";
$templateParams["nome"] = "assistenzaC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;

if(isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}

require("../template/base.php");
?>