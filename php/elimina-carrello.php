<?php
require_once 'bootstrap.php';

$dbhost->removeProductFromCart($_SESSION["utente"], $_GET["id"]);

header("Location: carrello.php");

?>