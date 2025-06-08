<?php
require_once 'bootstrap.php';

if (!isUserLoggedIn()) {
    $_SESSION["redirect"] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit;
}

if (isset($_GET["id"])) {
    $dbhost->removeProductFromCart($_SESSION["utente"], $_GET["id"]);
    header("Location: carrello.php");
    exit;
}

$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["titolo"] = "Mondo Morbidoso - Carrello";
$templateParams["nome"] = "carrelloC.php";
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);

require_once '../template/base.php';
?>