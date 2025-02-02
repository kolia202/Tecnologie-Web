<?php
require_once("bootstrap.php");
session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["payment"])) {
        $_SESSION["pagamento"] = $_POST["payment"];
        header("Location: ordine.php");
    } else {
        $_SESSION["paymenterror"] = "Per favore, seleziona un metodo di pagamento per proseguire";
        header("Location: pagamento.php");
    }
}

$templateParams["titolo"] = "Mondo Morbidoso - Pagamento";
$templateParams["nome"] = "pagina-pagamento.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$templateParams["pagamenti"] = $dbhost->getPaymentTypes();
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);


require '../template/base.php';
?>