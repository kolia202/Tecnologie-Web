<?php
require_once("bootstrap.php");
session_start();

$templateParams["titolo"] = "Mondo Morbidoso - Riepilogo Ordine";
$templateParams["nome"] = "dettaglio-ordine.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$costospedizione = $dbhost->getShippingPrice($_SESSION["spedizione"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
$_SESSION["totaleordine"] = $totale + $costospedizione;

require '../template/base.php';
?>