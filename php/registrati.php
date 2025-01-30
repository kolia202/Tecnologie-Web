<?php 
require_once("bootstrap.php");
session_start();
$templateParams["titolo"] = "Mondo Morbidoso - Registrati";
$templateParams["nome"] = "registratiC.php";
$templateParams["categorie"] = $dbhost->getCategories();
require("../template/base.php");
?>