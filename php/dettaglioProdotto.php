<?php
    require_once 'bootstrap.php';
    session_start();

    if (isset($_GET["azione"]) && $_GET["azione"] == "aggiungi" && isset($_GET["id_prodotto"])) {
        if (!isUserLoggedIn()) {
            header("Location: account.php?error=non_loggato");
            exit();
        }
    
        $email = $_SESSION["utente"];
        $id_prodotto = intval($_GET["id_prodotto"]);
    
        if ($dbhost->addPreferito($email, $id_prodotto)) {
            header("Location: dettaglioProdotto.php?id=$id_prodotto&success=preferito_aggiunto");
            exit();
        } else {
            header("Location: dettaglioProdotto.php?id=$id_prodotto&error=errore_db");
            exit();
        }
    }

    $templateParams["titolo"] = "Mondo Morbidoso - Dettaglio Peluche";
    $templateParams["nome"] = "singolo-prodotto.php";
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
    }

    if(isAdminLoggedIn()) {
        $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
    }

    require '../template/base.php';
?>