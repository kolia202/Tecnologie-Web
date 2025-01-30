<?php 
require_once("bootstrap.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $cognome = trim($_POST["cognome"]);
    $telefono = trim($_POST["telefono"]);
    $dataDiNascita = trim($_POST["data_nascita"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];
    if ($password !== $password_confirm) {
        $_SESSION["error"] = "Le password non corrispondono!";
        header("Location: registrati.php");
        exit;
    }
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    if ($dbhost->checkEmail($email)) {
        $_SESSION["error"] = "L'email è già registrata!";
        header("Location: registrati.php");
        exit;
    }
    if ($dbhost->registrazione($nome, $cognome, $email, $password_hash, $dataDiNascita, $telefono)) {
        echo "Registrazione completata con successo!";
        header("Location: account.php");
        exit;
    } else {
        echo "Errore durante la registrazione.";
    }
}
$templateParams["titolo"] = "Mondo Morbidoso - Registrati";
$templateParams["nome"] = "registratiC.php";
$templateParams["categorie"] = $dbhost->getCategories();
require("../template/base.php");
?>