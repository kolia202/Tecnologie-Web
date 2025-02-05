<?php
require_once("bootstrap.php");
session_start();

$templateParams["titolo"] = "Mondo Morbidoso - Ordini";
$templateParams["nome"] = "lista-ordini.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);

if (isAdminLoggedIn()) {
    $templateParams["ordini"] = $dbhost->getAllOrders();
    
} else {
    $templateParams["ordini"] = $dbhost->getAllUserOrders($_SESSION["utente"]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isAdminLoggedIn()) {
    if (isset($_POST["cambiaStato"]) && isset($_POST["id_ordine"]) && isset($_POST["stato"])) {
        $orderId = $_POST["id_ordine"]; 
        $newStatus = $_POST["stato"];
        $dbhost->updateOrderStatus($orderId, $newStatus);
        header("Location: ordini.php");
        exit();
    }
}


if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}

require '../template/base.php';
?>