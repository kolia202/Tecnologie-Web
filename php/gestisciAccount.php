<?php
require_once("bootstrap.php");
session_start();

$templateParams["titolo"] = "Mondo Morbidoso - Preferiti";
$templateParams["nome"] = "gestisciAccountC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["preferiti"] = $dbhost->getPreferiti($_SESSION["utente"]);
$utenti = $dbhost->getAllUtentiNonAdmin();

if (isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    if ($dbhost->deleteNotificaByEmail($email) &&
        $dbhost->deleteCarrelloByEmail($email) &&
        $dbhost->deletePreferitoByEmail($email) &&
        $dbhost->deleteRecensioneByEmail($email) &&
        $dbhost->deleteAvvisoDisponibilitaByEmail($email) &&
        $dbhost->deleteOrdersByEmail($email)) {
        if ($dbhost->deleteUtente($email)) {
            header("Location: gestisciAccount.php?deleted=1");
            exit();
        }
    }
}


if (isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}

require("../template/base.php");
?>