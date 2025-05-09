<?php
require_once("bootstrap.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = trim($_POST['email']);
    if (!empty($email)) {
        if ($dbhost->checkEmail($email)) {
            $_SESSION['reset_email'] = $email; 
            header("Location: resetPassword.php");
            exit();
        } else {
            $_SESSION["error"] = "E-mail non trovata!";
            header("Location: controlloEmail.php");
            exit();
        }
    }
}
$templateParams["titolo"] = "Mondo Morbidoso - Account";
$templateParams["nome"] = "controlloEmailC.php";
$numeroprodotti = 0;

require("../template/base.php");
?>