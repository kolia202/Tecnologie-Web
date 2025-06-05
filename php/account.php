<?php
require_once("bootstrap.php");

if (!isUserLoggedIn()) {
    $_SESSION["redirect"] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit;
}

$templateParams["titolo"] = "Mondo Morbidoso - Account";
$templateParams["nome"] = "accountC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;
$userDetails = $dbhost->getUserDetails($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$numeronotifiche = $dbhost->getUserNewMessages($_SESSION["utente"]);

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update_profile"])) {
    $email = $_SESSION["utente"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $newemail = $_POST["email"];
    $datadinascita = $_POST["data_nascita"];
    $numerotelefono = $_POST["numero_telefono"];
    if ($dbhost->modificaProfilo($email, $nome, $cognome, $newemail, $datadinascita, $numerotelefono)) {
        if ($email !== $newemail) {
            unset($_SESSION["utente"]);
            $_SESSION["utente"] = $newemail;
        }

        $_SESSION['success'] = "Il tuo profilo è stato aggiornato con successo!";
    } else {
        $_SESSION['error'] = "Ops! Errore durante l'aggiornamento del profilo.";
    }
    header("Location: account.php");
    exit();
}

require("../template/base.php");
?>