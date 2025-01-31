<?php
require_once("bootstrap.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);
    if ($newPassword === $confirmPassword) {
        if ($dbhost->updatePassword($_SESSION['reset_email'], $newPassword)) {
            unset($_SESSION['reset_email']);
            header("Location: account.php");
            exit();
        } else {
            $_SESSION["error"] = "Errore nell'aggiornamento della password.";
        }
    } else {
        $_SESSION["error"] = "Le password non corrispondono!";
    }
}
$templateParams["titolo"] = "Mondo Morbidoso - Account";
$templateParams["nome"] = "resetPasswordC.php";
require("../template/base.php");
?>