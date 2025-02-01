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
<<<<<<< HEAD

    if(isUserLoggedIn()) {
        $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
        $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    }

    require '../template/base.php';
=======
}
$templateParams["categorie"] = $dbhost->getCategories();
require '../template/base.php';
>>>>>>> 28023321d733c8f616488e3e694bcf126fbd9fa8
?>
