<?php
require_once("bootstrap.php");
session_start();
$templateParams["titolo"] = "Mondo Morbidoso - Home";
$templateParams["nome"] = "indexC.php";
$templateParams["mediaVoti"] = $dbhost->getMediaVoti();
$templateParams["numeroRecensioni"] = $dbhost->getNumeroRecensioni();
$templateParams["prodotti"] = $dbhost->getProdotto();
$templateParams["categorie"] = $dbhost->getCategories();
require("../template/base.php");
?>