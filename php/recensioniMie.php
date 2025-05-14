<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Recensioni";
$templateParams["nome"] = "recensioniMieC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;
if (isUserLoggedIn()) {
    $userDetails = $dbhost->getUserDetails($_SESSION["utente"]);
    $templateParams["utente"] = $userDetails;
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
    $recensioni = $dbhost->getRecensioniByEmail($userDetails["E_mail"]);
    $templateParams["recensioni"] = $recensioni; 
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_recensione"])) {
        $dbhost->removeRecensione($userDetails["E_mail"], $_POST["id_recensione"]);
        header("Location: recensioniMie.php");
        exit();
    }
}
require("../template/base.php");
?>
