<?php
require_once("bootstrap.php");
session_start();

if(isset($_SESSION["paymenterror"])) {
    unset($_SESSION["paymenterror"]);
}

$templateParams["titolo"] = "Mondo Morbidoso - Spedizione";
$templateParams["nome"] = "scelta-spedizione.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$templateParams["spedizioni"] = $dbhost->getShippingTypes();
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);

$spedizioneGratuita = $totale > 50;

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($spedizioneGratuita) {
        $_SESSION["spedizione"] = 3;
        header("Location: pagamento.php");
    } else if (isset($_POST["shipping"])) {
        $_SESSION["spedizione"] = $_POST["shipping"];
        header("Location: pagamento.php");
    } else {
        $_SESSION["shippingerror"] = "Per favore, seleziona un metodo di spedizione per proseguire";
        header("Location: spedizione.php");
    }
}

require '../template/base.php';
?>