<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Dettaglio Ordine";
$templateParams["nome"] = "dettaglioOrdineC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
if(isset($_GET["id"])) {
    $idordine = $_GET["id"];
}
$ordine = $dbhost->getOrderById($idordine);
$templateParams["prodottiordinati"] = $dbhost->getOrderedProducts($idordine);

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}

require '../template/base.php';
?>