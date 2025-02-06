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
        $_SESSION["error"] = "Ops! Le password non corrispondono!";
        header("Location: registrati.php");
        exit;
    }
    if ($dbhost->checkEmail($email)) {
        $_SESSION["error"] = "L'email inserita è già associata ad un altro account!";
        header("Location: registrati.php");
        exit;
    }
    if ($dbhost->registrazione($nome, $cognome, $email, $password, $dataDiNascita, $telefono)) {
        $dbhost->addNewMessage('Conferma Iscrizione', 'Benvenuto nella nostra famiglia di peluche! Siamo felici di averti con noi. Scopri la nostra collezione e trova i peluche perfetti per te!', $email);
        $templateParams['admins'] = $dbhost->getAdmins();
        foreach($templateParams['admins'] as $admin) {
            $dbhost->addNewMessage('Nuova Iscrizione', 'Dai il benvenuto a un nuovo membro nella nostra famiglia morbidosa! Un utente si è appena registrato e si prepara a scoprire la nostra collezione di peluches.', $admin['E_mail']);
        }
        $_SESSION["utente"] = $email;
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