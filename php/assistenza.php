<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Assistenza Clienti";
$templateParams["nome"] = "assistenzaC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}

if(isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"]);
    $cognome = trim($_POST["cognome"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);
    $templateParams['admins'] = $dbhost->getAdmins();
    foreach($templateParams['admins'] as $admin) {
        $dbhost->addNewMessage('Nuova Richiesta di Assistenza', $nome . ' ' . $cognome . ' (' . $email . ') ha inviato una richiesta di assistenza: ' . $message, $admin['E_mail']);
    }
    $_SESSION['success'] = 'La tua richiesta di assistenza è stata inviata con successo. Ti risponderemo al più presto!';
    header("Location: assistenza.php");
    exit;
}

require("../template/base.php");
?>