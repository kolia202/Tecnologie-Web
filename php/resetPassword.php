<?php
require_once("bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);
    if ($newPassword === $confirmPassword) {
        if ($dbhost->updatePassword($_SESSION['reset_email'], $newPassword)) {
            unset($_SESSION['reset_email']);
            $_SESSION['success'] = 'La tua Password è stata resettata con successo! Accedi e torna subito a esplorare il nostro sito.';
            header("Location: login.php");
            exit();
        } else {
            $_SESSION["error"] = "Errore nell'aggiornamento della Password.";
        }
    } else {
        $_SESSION["error"] = "Ops! Le Password non corrispondono!";
    }
}

$templateParams["titolo"] = "Mondo Morbidoso - Reset";
$templateParams["nome"] = "resetPasswordC.php";
$numeroprodotti = 0;
$templateParams["categorie"] = $dbhost->getCategories();

require("../template/base.php");
?>