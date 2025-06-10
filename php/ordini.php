<?php
require_once("bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isAdminLoggedIn()) {
    $orderId = $_POST["id_ordine"]; 
    $newStatus = $_POST["stato"];
    $orderDetails = $dbhost->getOrderById($orderId);
    $userEmail = $orderDetails["E_mail"];
    $dbhost->updateOrderStatus($orderId, $newStatus);
    $tiponotifica = "Aggiornamento Ordine";
    $testo = "Il tuo ordine #$orderId è stato aggiornato allo stato: $newStatus. Puoi vedere i dettagli direttamente dal tuo profilo!";
    $dbhost->addNewMessage($tiponotifica, $testo, $userEmail);
    header("Location: ordini.php");
    exit();
}

$templateParams["titolo"] = "Mondo Morbidoso - Ordini";
$templateParams["nome"] = "ordiniC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);

if (isAdminLoggedIn()) {
    $templateParams["ordini"] = $dbhost->getAllOrders();
    
} else {
    $templateParams["ordini"] = $dbhost->getAllUserOrders($_SESSION["utente"]);
}

if(isAdminLoggedIn()) {
    $nuovenotificheadmin = $dbhost->getUserNewMessages($_SESSION['utente']);
}

require '../template/base.php';
?>