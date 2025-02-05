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
    if (!isAdminLoggedIn() && $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["voto"]) && isset($_POST["commento"])) {
        $email = $_SESSION["utente"];
        $voto = intval($_POST["voto"]);
        $commento = trim($_POST["commento"]);

        if ($voto >= 1 && $voto <= 5 && !empty($commento)) {
            if ($dbhost->addRecensione($email, $voto, $commento)) {
                $dbhost->addNewMessage('Nuova Recensione', 'Grazie per la tua recensione! La tua opinione è importante per noi.', $email);
                header("Location: recensioni.php");
                exit();
            } else {
                echo "Errore nell'inserimento della recensione.";
            }
        } else {
            echo "Dati non validi.";
        }
    }
    if (isAdminLoggedIn() && $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nome"]) && isset($_POST["cognome"])) {
        $nome = trim($_POST["nome"]);
        $cognome = trim($_POST["cognome"]);
        $recensioni = $dbhost->getIdRecensioneByNomeCognome($nome, $cognome);
        
        if (!empty($recensioni)) {
            foreach ($recensioni as $recensione) {
                $idRecensione = intval($recensione["Id_recensione"]);
                if ($dbhost->deleteRecensione($idRecensione)) {
                    header("Location: recensioni.php");
                    exit();
                } else {
                    echo "Errore nell'eliminazione della recensione.";
                }
            }
        } else {
            echo "Nessuna recensione trovata per questo utente.";
        }
    }
}

require("../template/base.php");
?>
