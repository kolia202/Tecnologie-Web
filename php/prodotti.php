<?php
    require_once("bootstrap.php");
    session_start();
    $templateParams["titolo"] = "Mondo Morbidoso - Peluches";
    $templateParams["nome"] = "lista-prodotti.php";
    $templateParams["categorie"] = $dbhost->getCategories();
    $templateParams["prodotti"] = $dbhost->getProducts();
    require '../template/base.php';
?>
