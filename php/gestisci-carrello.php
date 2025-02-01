<?php

require_once 'bootstrap.php';
session_start();

if (!isUserLoggedIn() || !isset($_GET["action"]) || ($_GET["action"] != 1 && $_GET["action"] != 2)) {
    header("Location: account.php");
    exit;
}

$idprodotto = $_GET['id'];

if($idprodotto && $_GET["action"] == 1) {
    $dbhost->addProductToCart($_SESSION['utente'], $idprodotto);
    header('Location: carrello.php');
    exit;
} else if ($idprodotto && $_GET["action"] == 2) {
    $dbhost->deleteProductFromCart($_SESSION['utente'], $idprodotto);
    header('Location: carrello.php');
    exit;
}

?>