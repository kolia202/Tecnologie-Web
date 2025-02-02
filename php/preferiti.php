<?php
    require_once 'bootstrap.php';
    session_start();

    if (!isUserLoggedIn()) {
        header("Location: login.php?error=non_loggato");
        exit();
    }
    
    $templateParams["titolo"] = "Mondo Morbidoso - Preferiti";
    $templateParams["nome"] = "preferitiC.php";
    $templateParams["categorie"] = $dbhost->getCategories();
    $templateParams["preferiti"] = $dbhost->getPreferiti($_SESSION["utente"]);

    if (isUserLoggedIn()) {
        $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
        $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
        $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
    }
    require '../template/base.php';
?>