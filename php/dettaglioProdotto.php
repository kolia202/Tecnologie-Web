<?php
    require_once 'bootstrap.php';
    session_start();

    $templateParams["titolo"] = "Mondo Morbidoso - Dettaglio Peluche";
    $templateParams["nome"] = "singolo-prodotto.php";
    $templateParams["categorie"] = $dbhost->getCategories();

    $idprodotto = -1;
    if(isset($_GET["id"])) {
        $idprodotto = $_GET["id"];
    }
    $templateParams["prodotto"] = $dbhost->getProductById($idprodotto);

    if(isUserLoggedIn()) {
        $templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
        $totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);
    }

    require '../template/base.php';
?>