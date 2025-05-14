<?php
require_once 'bootstrap.php';

$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["titolo"] = "Mondo Morbidoso - Conferma Ordine";
$templateParams["nome"] = "conferma-ordine.php";
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$numeroprodotti = 0;

require_once '../template/base.php';
?>