<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Preferiti";
$templateParams["nome"] = "gestioneAccountC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["preferiti"] = $dbhost->getPreferiti($_SESSION["utente"]);
$utenti = $dbhost->getAllUtentiNonAdmin();

if (isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
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
            $_SESSION['eliminautente'] = 'Account eliminato con successo!';
            header("Location: gestioneAccount.php?");
            exit();
        }
    }
}

require("../template/base.php");
?>