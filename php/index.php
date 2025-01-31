<?php
require_once("bootstrap.php");
session_start();
$templateParams["titolo"] = "Mondo Morbidoso - Home";
$templateParams["nome"] = "indexC.php";
$templateParams["mediaVoti"] = $dbhost->getMediaVoti();
$templateParams["numeroRecensioni"] = $dbhost->getNumeroRecensioni();
$templateParams["categorie"] = $dbhost->getCategories();
$templateParams["prodotti"] = $dbhost->getNomiFotoPrezziProdottiCasuali();
$templateParams["recensioni"] = $dbhost->getTestoRecensioniCasuali();
require("../template/base.php");
?>