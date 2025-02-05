<?php
require_once("bootstrap.php");
session_start();
$templateParams["titolo"] = "Mondo Morbidoso - Home";
$templateParams["nome"] = "indexC.php";
$templateParams["mediaVoti"] = $dbhost->getMediaVoti();
$templateParams["numeroRecensioni"] = $dbhost->getNumeroRecensioni();
$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["prodotti"] = $dbhost->getNomiFotoPrezziProdottiCasuali();
$templateParams["recensioni"] = $dbhost->getTestoRecensioniCasuali();
$numeroprodotti = 0;

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
} 

if(isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}

$message = "";
$success = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);

    if (empty($email)) {
        $message = "Inserisci un'email valida.";
        $success = false;
    } else {
        if ($dbhost->emailExists($email)) {
            $notificaEsiste = $dbhost->notificationExists($email, "Newsletter", "Grazie per esserti iscritto alla nostra newsletter!");

            if ($notificaEsiste) {
                $message = "Sei già iscritto alla newsletter!";
                $success = false;
            } else {
                $success = $dbhost->addNewMessage("Newsletter", "Grazie per esserti iscritto alla nostra newsletter!", $email);
                $message = $success ? "Iscrizione avvenuta con successo!" : "Errore nell'invio della notifica.";
            }
        } else {
            $message = "L'email non è stata trovata!";
            $success = false;
        }
    }

    header("Location: ".$_SERVER['PHP_SELF']."?message=".urlencode($message)."&success=".($success ? "1" : "0")."#newsletter");
    exit;
}

if (isset($_GET["message"])) {
    $message = urldecode($_GET["message"]);
    $success = isset($_GET["success"]) && $_GET["success"] == "1";
}
require("../template/base.php");
?>