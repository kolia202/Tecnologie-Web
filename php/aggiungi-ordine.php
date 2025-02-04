<?php

require_once("bootstrap.php");
session_start();

$utente = $_SESSION["utente"];

$idordine = $dbhost->addNewOrder($utente, $_SESSION["totaleordine"], $_SESSION["spedizione"], $_SESSION["pagamento"]);
$punti = (floor($_SESSION["totaleordine"] / 10)) - $_SESSION["puntiusati"];

foreach($dbhost->getCartProducts($utente) as $prodotto) {
    $dbhost->addOrderedProduct($idordine, $prodotto["Id_prodotto"], $prodotto["Quantita"]);
    $dbhost->updateStock($prodotto["Id_prodotto"], $prodotto["Quantita"]);
    $dbhost->removeProductFromCart($utente ,$prodotto["Id_prodotto"]);
}

$dbhost->updateUserPoints($utente, $punti);
$dbhost->addNewMessage('Nuovo Ordine', 'Il tuo ordine è stato confermato e i tuoi peluche stanno per mettersi in viaggio! Puoi seguire il loro percorso dal tuo profilo. Grazie per averci scelto!', $utente);

unset($_SESSION["totalecarrello"]);
unset($_SESSION["totaleordine"]);
unset($_SESSION["spedizione"]);
unset($_SESSION["pagamento"]);

header("Location: conferma.php");
exit;

?>