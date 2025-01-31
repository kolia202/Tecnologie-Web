<?php

require_once 'bootstrap.php';
session_start();

if (!isUserLoggedIn()) {
    header("Location: account.php");
    exit;
}

$idprodotto = isset($_GET['id']) ? $_GET["id"] : null;

if($idprodotto) {
    $dbhost->addProductToCart($_SESSION['utente'], $idprodotto);
    header('Location: carrello.php');
    exit;
} else {
    echo "Prodotto non valido";
}

?>