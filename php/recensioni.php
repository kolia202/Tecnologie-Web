<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Recensioni";
$templateParams["nome"] = "recensioniC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["numeroRecensioni"] = $dbhost->getNumeroRecensioni();
$mediaVoti = $dbhost->getMediaVoti();
$voti = $dbhost->getAllVotiRecensioni();
$recensioniDistribuzione = getRecensioniDistribuzione($voti);
$templateParams["recensioni"] = $dbhost->getAllRecensioni();
$numeroprodotti = 0;

if (isUserLoggedIn()) {
    $userDetails = $dbhost->getUserDetails($_SESSION["utente"]);
    $templateParams["utente"] = $userDetails;
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["voto"]) && isset($_POST["commento"])) {
    $email = $_SESSION["utente"];
    $voto = intval($_POST["voto"]);
    $commento = trim($_POST["commento"]);
    if ($dbhost->addRecensione($email, $voto, $commento)) {
        $dbhost->addNewMessage('Nuova Recensione', 'Grazie per la tua recensione! La tua opinione è importante per noi.', $email);
        header("Location: recensioni.php");
        exit();
    } else {
        echo "Errore nell'inserimento della recensione.";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id-recensione"])) {
    if ($dbhost->deleteRecensione($_POST['id-recensione'])) {
        $tiponotifica = "Eliminazione Recensione";
        $testo = "La tua recensione è stata rimossa dall'amministrazione. Se hai domande, contattaci.";
        $dbhost->addNewMessage($tiponotifica, $testo, $_SESSION['utente']);
        header("Location: recensioni.php");
        exit();
    } else {
        echo "Errore nell'eliminazione della recensione.";
    }
}

require("../template/base.php");
?>
