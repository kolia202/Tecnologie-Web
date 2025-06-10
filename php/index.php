<?php
require_once("bootstrap.php");

if (isset($_SESSION['redirect'])) {
    unset($_SESSION['redirect']);
}

$templateParams["titolo"] = "Mondo Morbidoso - Home";
$templateParams["nome"] = "indexC.php";
$mediaVoti = $dbhost->getMediaVoti();
$numRecensioni = $dbhost->getNumeroRecensioni();
$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["prodotti"] = $dbhost->getBestSellers();
$templateParams["recensioni"] = $dbhost->getAllRecensioni();
$numeroprodotti = 0;

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
} 

if(isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);

    if (empty($email)) {
        $_SESSION["errornewsletter"] = "Ops! Inserisci la tua email per iscriverti.";
    } else {
        if ($dbhost->emailExists($email)) {
            $errore = $dbhost->notificationExists($email, "Newsletter", "Grazie per esserti iscritto alla nostra newsletter! Da ora in poi non ti perderai più nessuna novità.");
            if ($errore) {
                $_SESSION["errornewsletter"] = "Ops! Sei già iscritto alla nostra newsletter!";
            } else {
                $dbhost->addNewMessage("Newsletter", "Grazie per esserti iscritto alla nostra newsletter! Da ora in poi non ti perderai più nessuna novità.", $email);
                $_SESSION["successnewsletter"] = "Iscrizione avvenuta con successo!";
            }
        } else {
            $_SESSION["errornewsletter"] = "Ops! L'email inserita non è associata a nessun account.";
        }
    }
    header("Location: ".$_SERVER['PHP_SELF']."#newsletter");
    exit;
}

require("../template/base.php");
?>