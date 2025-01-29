<?php
require_once("bootstrap.php");
session_start();
$templateParams["titolo"] = "Mondo Morbidoso - Home";
$templateParams["nome"] = "indexC.php";
require("../template/base.php");
?>