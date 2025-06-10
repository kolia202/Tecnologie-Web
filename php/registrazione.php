<?php 
require_once("bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $cognome = trim($_POST["cognome"]);
    $telefono = trim($_POST["telefono"]);
    $dataNascita = trim($_POST["data_nascita"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];
    if ($password !== $password_confirm) {
        $_SESSION["error"] = "Ops! Le password non corrispondono.";
        header("Location: registrazione.php");
        exit;
    }
    if ($dbhost->checkEmail($email)) {
        $_SESSION["error"] = "Ops! L'E-mail inserita è già associata ad un altro account.";
        header("Location: registrazione.php");
        exit;
    }
    if ($dbhost->registrazione($nome, $cognome, $email, $password, $dataNascita, $telefono)) {
        $dbhost->addNewMessage('Conferma Iscrizione', 'Benvenuto nella nostra famiglia di peluches! Siamo felici di averti con noi. Scopri la nostra collezione e trova i peluche perfetti per te!', $email);
        $templateParams['admins'] = $dbhost->getAdmins();
        foreach($templateParams['admins'] as $admin) {
            $dbhost->addNewMessage('Nuova Iscrizione', 'Dai il benvenuto ad un nuovo membro nella nostra famiglia! Un utente si è appena registrato ed è pronto a scoprire la nostra collezione di peluches.', $admin['E_mail']);
        }
        $_SESSION["success"] = "La tua iscrizione è avvenuta con successo! Accedi subito per iniziare a scoprire tutti i nostri peluches!";
        header("Location: login.php");
        exit;
    } else {
        echo "Errore durante la registrazione.";
    }
}

$templateParams["titolo"] = "Mondo Morbidoso - Registrazione";
$templateParams["nome"] = "registrazioneC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = 0;

require("../template/base.php");
?>