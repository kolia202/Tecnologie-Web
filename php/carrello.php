<?php
require_once 'bootstrap.php';
session_start();

if(!isUserLoggedIn()) {
    header("Location: account.php");
    exit;
}

$templateParams["titolo"] = "Mondo Morbidoso - Carrello";
$templateParams["nome"] = "prodotti-carrello.php";
$templateParams["prodotti"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);

require_once '../template/base.php';
?>