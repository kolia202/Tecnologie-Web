<?php
require_once("bootstrap.php");
session_start();

$templateParams["titolo"] = "Mondo Morbidoso - Riepilogo Ordine";
$templateParams["nome"] = "dettaglio-ordine.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
$costospedizione = $totale > 50 ? 0.00 : $dbhost->getShippingPrice($_SESSION["spedizione"]);

$_SESSION["totaleordine"] = $_SESSION["totalecarrello"] + $costospedizione;

require '../template/base.php';
?>