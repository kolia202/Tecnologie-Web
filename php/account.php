<?php
require_once("bootstrap.php");
session_start();
if (isset($_POST["logout"])) {
    unset($_SESSION["utente"]); 
    header("Location: index.php"); 
    exit;
}

if (isset($_POST["accedi"])) {
    $email = $_POST["email"];  
    $password = $_POST["password"];
    $login_result = $dbhost->checkLogin($email, $password);
    if (count($login_result) == 0) {
        $templateParams["errorelogin"] = "Riprova! Email o Password errati";
    } else {
        $_SESSION["utente"] = $login_result[0]["E_mail"];
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
}

require("../template/base.php");
?>