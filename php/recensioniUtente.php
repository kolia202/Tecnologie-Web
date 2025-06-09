<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Recensioni";
$templateParams["nome"] = "recensioniUtenteC.php";
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
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_recensione"])) {
    $dbhost->deleteRecensione($_POST["id_recensione"]);
    header("Location: recensioniUtente.php");
    exit();
}

if (isset($_POST['modificarecensione'])) {
    $voto = $_POST['voto'];
    $commento = $_POST['commento'];
    $id = $_POST['idrecensione'];
    $dbhost->modifyReview($id, $voto, $commento);
    header('Location: recensioniUtente.php');
}

require("../template/base.php");
?>
