<?php 
require_once("bootstrap.php");
session_start();
$templateParams["titolo"] = "Mondo Morbidoso - Account";
$templateParams["nome"] = "accountC.php";
require("../template/base.php");
?>