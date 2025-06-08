<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Spedizione";
$templateParams["nome"] = "spedizioneC.php";
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
    }
}

require '../template/base.php';
?>