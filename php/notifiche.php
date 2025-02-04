<?php
require_once 'bootstrap.php';
session_start();

if(isset($_POST["eliminanotifica"])) {
    $dbhost->deleteMessage($_POST["eliminanotifica"]);
}

$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["titolo"] = "Mondo Morbidoso - Notifiche";
$templateParams["nome"] = "lista-notifiche.php";
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["notifiche"] = $dbhost->getUserMessages($_SESSION["utente"]);

require_once '../template/base.php';
?>