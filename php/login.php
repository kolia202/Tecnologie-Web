<?php
require_once("bootstrap.php");

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
        header('Location: login.php');
        exit;
    } else {
        $_SESSION["utente"] = $login_result[0]["E_mail"];
        $_SESSION["admin"] = intval($login_result[0]["Admin"]);
        if (isset($_SESSION["redirect"])) {
            $redirect = $_SESSION["redirect"];
            unset($_SESSION["redirect"]);
            header("Location: $redirect");
        } else {
            header("Location: index.php");
        }
        exit;
    }
}

$templateParams["titolo"] = "Mondo Morbidoso - Login";
$templateParams["nome"] = "LoginC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;

require("../template/base.php");
?>