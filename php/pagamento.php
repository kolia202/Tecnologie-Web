<?php
require_once("bootstrap.php");
session_start();

$templateParams["titolo"] = "Mondo Morbidoso - Pagamento";
$templateParams["nome"] = "pagina-pagamento.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$templateParams["pagamenti"] = $dbhost->getPaymentTypes();
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
$totalepunti = $dbhost->getTotalCartPoints($_SESSION["utente"]);
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
    if ($costospedizione == 0.00 && $_SESSION["totalecarrello"] == 0.00) {
        $_SESSION["pagamento"] = 4;
        header("Location: ordine.php");
    } else if (isset($_POST["payment"])) {
        $_SESSION["pagamento"] = $_POST["payment"];
        header("Location: ordine.php");
    } else {
        $_SESSION["paymenterror"] = "Per favore, seleziona un metodo di pagamento per proseguire";
        header("Location: pagamento.php");
    }
}

require '../template/base.php';
?>