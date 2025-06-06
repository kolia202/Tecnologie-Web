<?php
    require_once 'bootstrap.php';

    if (isset($_GET["azione"]) && $_GET["azione"] == "aggiungi" && isset($_GET["id_prodotto"])) {
        if (!isUserLoggedIn()) {
            $_SESSION["redirect"] = $_SERVER['REQUEST_URI'];
            header("Location: login.php");
            exit();
        }
        $email = $_SESSION["utente"];
        $id_prodotto = intval($_GET["id_prodotto"]);
        $dbhost->addPreferito($email, $id_prodotto);
        header("Location: dettaglioProdotto.php?id=$id_prodotto");
        exit();
    }

    if (isset($_GET["azione"]) && $_GET["azione"] == "rimuovi" && isset($_GET["id_prodotto"])) {
        $id_prodotto = intval($_GET["id_prodotto"]);
        $dbhost->removePreferito($_SESSION["utente"], $id_prodotto);
        header("Location: dettaglioProdotto.php?id=$id_prodotto"); 
        exit();
    }

    $templateParams["titolo"] = "Mondo Morbidoso - Dettaglio Peluche";
    $templateParams["nome"] = "dettaglioProdottoC.php";
    $templateParams["categorie"] = $dbhost->getCategories();
    $idprodotto = -1;
    if (isset($_GET["id"])) {
        $idprodotto = $_GET["id"];
    }
    $templateParams["prodotto"] = $dbhost->getProductById($idprodotto);
    $numeroprodotti = 0;
    $prodottopreferito = false;

    if (isUserLoggedIn()) {
        $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
        $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
        $numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
        $prodottopreferito = $dbhost->isPreferito($_SESSION['utente'], $idprodotto) == 0 ? false : true;
        $avvisodisponibilità = $dbhost->alreadyNoticed($_SESSION['utente'], $idprodotto);
    }

    if(isAdminLoggedIn()) {
        $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
    }

    require '../template/base.php';
?>