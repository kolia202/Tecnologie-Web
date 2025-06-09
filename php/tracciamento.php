<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Mondo Morbidoso - Ordini";
$templateParams["nome"] = "tracciamentoC.php";
$templateParams["categorie"] = $dbhost->getCategories();
$numeroprodotti = $dbhost->getNumberCartProducts($_SESSION["utente"]);
$templateParams["carrello"] = $dbhost->getCartProducts($_SESSION["utente"]);
$templateParams["ordini"] = $dbhost->getAllUserOrders($_SESSION["utente"]);
$totale = $dbhost->getTotalCartPrice($_SESSION["utente"]);

if(isset($_GET["id"])) {
    $idordine = $_GET["id"];
}
$ordine = $dbhost->getOrderById($idordine);
$spedizione = $dbhost->getShippingById($ordine['Id_spedizione']);
$giorni = $spedizione['Giorni'];
$dataeffettuazione = new DateTime($ordine['Data_effettuazione']);
$dataprevista = $dataeffettuazione->modify("+$giorni days")->format('d-m-Y');

require '../template/base.php';
?>