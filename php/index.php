<?php
require_once("bootstrap.php");
session_start();
$templateParams["titolo"] = "Mondo Morbidoso - Home";
$templateParams["nome"] = "indexC.php";
$templateParams["mediaVoti"] = $dbhost->getMediaVoti();
$templateParams["numeroRecensioni"] = $dbhost->getNumeroRecensioni();
$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["prodotti"] = $dbhost->getNomiFotoPrezziProdottiCasuali();
$templateParams["recensioni"] = $dbhost->getTestoRecensioniCasuali();
$numeroprodotti = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["emailInput"])) {
    $email = trim($_POST["emailInput"]);

    if ($dbhost->emailExists($email)) {
        $messaggio = "Grazie per esserti iscritto alla newsletter!";
        $dbhost->addNewMessage("Newsletter", $messaggio, $email);

        echo json_encode(["status" => "success", "message" => "Ti abbiamo iscritto alla newsletter!"]);
    } else {
        echo json_encode(["status" => "danger", "message" => "Email non trovata. Registrati per ricevere la newsletter!"]);
    }
} else {
    echo json_encode(["status" => "danger", "message" => "Richiesta non valida."]);
}


if(isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}

require("../template/base.php");
?>