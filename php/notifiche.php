<?php
require_once 'bootstrap.php';

if(isset($_POST["eliminanotifica"])) {
    $dbhost->deleteMessage($_POST["eliminanotifica"]);
}

if(isset($_POST["eliminanotifiche"])) {
    $dbhost->deleteAllMessages($_SESSION['utente']);
}

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}

$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["titolo"] = "Mondo Morbidoso - Notifiche";
$templateParams["nome"] = "notificheC.php";
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["notifiche"] = $dbhost->getUserMessages($_SESSION["utente"]);

require_once '../template/base.php';
?>