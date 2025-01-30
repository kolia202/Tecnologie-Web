<?php 
require_once("bootstrap.php");
session_start();
$templateParams["titolo"] = "Mondo Morbidoso - Registrati";
$templateParams["nome"] = "registratiC.php";
require("../template/base.php");
?>