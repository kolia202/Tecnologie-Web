<?php
require_once 'bootstrap.php';
session_start();

$dbhost->removeProductFromCart($_SESSION["utente"], $_GET["id"]);

header("Location: carrello.php");

?>