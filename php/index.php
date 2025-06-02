<?php
require_once("bootstrap.php");

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
        $_SESSION["errornewsletter"] = "Ops! L'E-mail inserita non è valida.";
    } else {
        if ($dbhost->emailExists($email)) {
            $errore = $dbhost->notificationExists($email, "Newsletter", "Grazie per esserti iscritto alla nostra newsletter!");
            if ($errore) {
                $_SESSION["errornewsletter"] = "Ops! Sei già iscritto alla newsletter!";
            } else {
                $dbhost->addNewMessage("Newsletter", "Grazie per esserti iscritto alla nostra newsletter!", $email);
                $_SESSION["successnewsletter"] = "Iscrizione avvenuta con successo!";
            }
        } else {
            $_SESSION["errornewsletter"] = "Ops! L'email inserita non è valida!";
        }
    }
    header("Location: ".$_SERVER['PHP_SELF']."#newsletter");
    exit;
}

require("../template/base.php");
?>