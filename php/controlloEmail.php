<?php
require_once("bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = trim($_POST['email']);
    if (!empty($email)) {
        if ($dbhost->checkEmail($email)) {
            $_SESSION['reset_email'] = $email; 
            header("Location: resetPassword.php");
            exit();
        } else {
            $_SESSION["error"] = "Ops! L'E-mail inserita non corrisponde a nessun account.";
            header("Location: controlloEmail.php");
            exit();
        }
    }
}
$templateParams["titolo"] = "Mondo Morbidoso - Login";
$templateParams["nome"] = "controlloEmailC.php";
$numeroprodotti = 0;
$templateParams["categorie"] = $dbhost->getCategories();

require("../template/base.php");
?>