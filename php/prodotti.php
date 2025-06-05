<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Peluches";
$templateParams["nome"] = "prodottiC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;

$category = isset($_GET["categoria"]) ? $_GET["categoria"] : null;
if ($category) {
    $templateParams["prodotti"] = isAdminLoggedIn() ? $dbhost->getAdminProductsByCategory($category) : $dbhost->getProductsByCategory($category);
} else if(isset($_GET["search"])) {
    $templateParams["prodotti"] = isAdminLoggedIn() ? $dbhost->getAdminSearchedProducts(trim($_GET["search"])) : $dbhost->getSearchedProducts(trim($_GET["search"]));
} else {
    $templateParams["prodotti"] = isAdminLoggedIn() ? $dbhost->getAdminProducts() : $dbhost->getProducts();
}

if(isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}

require '../template/base.php';
?>
