<?php 
require_once("bootstrap.php");
session_start();
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
    if ($dbhost->checkEmail($email)) {
        $_SESSION["error"] = "L'email è già registrata!";
        header("Location: registrati.php");
        exit;
    }
    if ($dbhost->registrazione($nome, $cognome, $email, $password, $dataDiNascita, $telefono)) {
        $dbhost->addNewMessage('Conferma Iscrizione', 'Benvenuto nella nostra famiglia di peluche! Siamo felici di averti con noi. Scopri la nostra collezione e trova i peluche perfetti per te!', $email);
        echo "Registrazione completata con successo!";
        header("Location: index.php");
        exit;
    } else {
        echo "Errore durante la registrazione.";
    }
}
$templateParams["titolo"] = "Mondo Morbidoso - Registrati";
$templateParams["nome"] = "registratiC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;

require("../template/base.php");
?>