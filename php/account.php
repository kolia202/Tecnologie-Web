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
        $templateParams["errorelogin"] = "Errore! Controllare username e password";
    } else {
        $_SESSION["utente"] = $login_result[0]["E_mail"];
        $userDetails = $dbhost->getUserDetails($_SESSION["utente"]);
        if ($userDetails) {
            $_SESSION["nome"] = isset($userDetails["Nome"]) ? $userDetails["Nome"] : "";
            $_SESSION["cognome"] = isset($userDetails["Cognome"]) ? $userDetails["Cognome"] : "";
            $_SESSION["telefono"] = isset($userDetails["Numero_telefono"]) ? $userDetails["Numero_telefono"] : "";
            $_SESSION["data_nascita"] = isset($userDetails["Data_di_nascita"]) ? $userDetails["Data_di_nascita"] : "";
            $_SESSION["punti"] = isset($userDetails["Punti"]) ? $userDetails["Punti"] : 0;
        } else {
            echo "Errore: Nessun dato trovato per l'utente.";
            exit;
        }
        header("location: index.php");
        exit;
    }
}
$templateParams["titolo"] = "Mondo Morbidoso - Account";
$templateParams["nome"] = "accountC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["error"] = isset($error) ? $error : null;

if(isUserLoggedIn()) {
    $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
    $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
}

require("../template/base.php");
?>