<?php
require_once 'bootstrap.php';
session_start();
if (!isUserLoggedIn()) {
    header("Location: account.php");
    exit();
}
$templateParams["titolo"] = "Mondo Morbidoso - Preferiti";
$templateParams["nome"] = "preferitiC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["preferiti"] = $dbhost->getPreferiti($_SESSION["utente"]);
if (isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}
if (isset($_GET["azione"]) && $_GET["azione"] == "rimuovi" && isset($_GET["id_prodotto"])) {
    $id_prodotto = intval($_GET["id_prodotto"]);
    $dbhost->removePreferito($_SESSION["utente"], $id_prodotto);
    header("Location: preferiti.php"); 
    exit();
}
require '../template/base.php';
?>
