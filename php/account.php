<?php
require_once("bootstrap.php");
session_start();

if (isset($_POST["logout"])) {
    unset($_SESSION["utente"]); 
    unset($_SESSION['admin']);
    header("Location: index.php"); 
    exit;
}

if (isset($_POST["accedi"])) {
    $email = $_POST["email"];  
    $password = $_POST["password"];
    $login_result = $dbhost->checkLogin($email, $password);
    if (count($login_result) == 0) {
        $_SESSION["errorelogin"] = "Ops! L'E-mail o la Password non sono corrette.";
        header('Location: account.php');
        exit;
    } else {
        $_SESSION["utente"] = $login_result[0]["E_mail"];
        $_SESSION["admin"] = intval($login_result[0]["Admin"]);
        header("location: index.php");
        exit;
    }
}

$templateParams["titolo"] = "Mondo Morbidoso - Account";
$templateParams["nome"] = "accountC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;

if(isUserLoggedIn()) {
    $userDetails = $dbhost->getUserDetails($_SESSION["utente"]);
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
    $numeronotifiche = $dbhost->getUserNewMessages($_SESSION["utente"]);
}

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
    if ($email !== $newemail) {
        unset($_SESSION["utente"]);
    }
    if ($dbhost->modificaProfilo($email, $nome, $cognome, $newemail, $datadinascita, $numerotelefono)) {
        if ($email !== $newemail) {
            $_SESSION["utente"] = $newemail;
        }

        header("Location: account.php?success=1");
        exit();
    } else {
        echo "<div class='alert alert-danger text-center'>Errore durante l'aggiornamento del profilo.</div>";
    }
}

require("../template/base.php");
?>