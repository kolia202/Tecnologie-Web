<?php
require_once("bootstrap.php");
session_start();
$templateParams["titolo"] = "Mondo Morbidoso - Peluches";
$templateParams["nome"] = "lista-prodotti.php";
$templateParams["categorie"] = $dbhost->getCategories();

$category = isset($_GET["categoria"]) ? $_GET["categoria"] : null;
if ($category) {
    $templateParams["prodotti"] = $dbhost->getProductsByCategory($category);
} else {
    $templateParams["prodotti"] = $dbhost->getProducts();
}

if(isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
}

require '../template/base.php';
?>
