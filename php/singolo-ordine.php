<?php
require_once("bootstrap.php");
session_start();

$templateParams["titolo"] = "Mondo Morbidoso - Dettaglio Ordine";
$templateParams["nome"] = "dettaglio-ordine.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
if(isset($_GET["id"])) {
    $idordine = $_GET["id"];
}
$ordine = $dbhost->getOrderById($idordine);
$templateParams["prodottiordinati"] = $dbhost->getOrderedProducts($idordine);

require '../template/base.php';
?>