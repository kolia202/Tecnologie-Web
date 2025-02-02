<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("bootstrap.php");
session_start();

$utente = $_SESSION["utente"];

$idordine = $dbhost->addNewOrder($utente, $_SESSION["totaleordine"], $_SESSION["spedizione"], $_SESSION["pagamento"]);

foreach($dbhost->getCartProducts($utente) as $prodotto) {
    $dbhost->addOrderedProduct($idordine, $prodotto["Id_prodotto"], $prodotto["Quantita"]);
    $dbhost->removeProductFromCart($utente ,$prodotto["Id_prodotto"]);
}

unset($_SESSION["totaleordine"]);
unset($_SESSION["spedizione"]);
unset($_SESSION["pagamento"]);

header("Location: conferma.php");
exit;

?>