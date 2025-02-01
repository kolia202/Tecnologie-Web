<?php
require_once("bootstrap.php");
session_start();
$templateParams["titolo"] = "Mondo Morbidoso - Peluches";
$templateParams["nome"] = "lista-prodotti.php";
$categoria = isset($_GET["categoria"]) ? $_GET["categoria"] : null;
if ($categoria) {
    $templateParams["prodotti"] = $dbhost->getProductsByCategory($categoria);
} else {
    $templateParams["prodotti"] = $dbhost->getProducts();
}
$templateParams["categorie"] = $dbhost->getCategories();
require '../template/base.php';
?>
