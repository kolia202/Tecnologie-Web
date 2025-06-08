<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Pagamento";
$templateParams["nome"] = "pagamentoC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
$totalepunti = 0;
$costospedizione = $totale > 50 ? 0.00 : $dbhost->getShippingPrice($_SESSION["spedizione"]);
$userDetails = $dbhost->getUserDetails($_SESSION["utente"]);
$_SESSION["totalecarrello"] = $totale;
$_SESSION["puntiusati"] = 0;

if(isset($_POST["usapunti"]) && $_POST["usapunti"] == "1") {
    if ($userDetails["Punti"] >= $totalepunti) {
        $_SESSION["totalecarrello"] = 0.00;
        $_SESSION["puntiusati"] = $totalepunti;
    }
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Location: riepilogo-ordine.php");
}

require '../template/base.php';
?>