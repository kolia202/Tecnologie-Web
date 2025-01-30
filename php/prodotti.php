<?php
    require_once("bootstrap.php");

    $templateParams["titolo"] = "Mondo Morbidoso - Peluches";
    $templateParams["nome"] = "lista-prodotti.php";
    $templateParams["categorie"] = $dbhost->getCategories();
    $templateParams["prodotti"] = $dbhost->getProducts();

    require '../template/base.php';
?>
