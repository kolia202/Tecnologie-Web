<?php
require_once("bootstrap.php");
session_start();
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
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_SESSION["utente"];
        $voto = intval($_POST["voto"]);
        $commento = trim($_POST["commento"]);
        if ($voto >= 1 && $voto <= 5 && !empty($commento)) {
            if ($dbhost->addRecensione($email, $voto, $commento)) {
                $dbhost->addNewMessage('Nuova Recensione', 'Grazie per aver lasciato una recensione! La tua opinione è importante per noi e ci aiuta a migliorare. Siamo felici che tu faccia parte della nostra famiglia morbidosa!', $email);
                header("Location: recensioni.php");
                exit();
            } else {
                echo "Errore nell'inserimento della recensione.";
            }
        } else {
            echo "Dati non validi.";
        }
    }
}
require("../template/base.php");
?>
