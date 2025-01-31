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
        header("location: account.php");
        exit;
    }
}
$templateParams["titolo"] = "Mondo Morbidoso - Account";
$templateParams["nome"] = "accountC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["error"] = isset($error) ? $error : null;
require("../template/base.php");
?>