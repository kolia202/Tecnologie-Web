<?php

require_once("bootstrap.php");

$utente = $_SESSION["utente"];

$idordine = $dbhost->addNewOrder($utente, $_SESSION["totaleordine"], $_SESSION['puntiusati'], $_SESSION["spedizione"]);
$punti = (floor($_SESSION["totaleordine"] / 10)) - $_SESSION["puntiusati"];
$templateParams['admins'] = $dbhost->getAdmins();

foreach($dbhost->getCartProducts($utente) as $prodotto) {
    $dbhost->addOrderedProduct($idordine, $prodotto["Id_prodotto"], $prodotto["Quantita"]);
    $p = $dbhost->getProductById($prodotto['Id_prodotto'])[0];
    $dbhost->updateStock($prodotto["Id_prodotto"], $p['Scorta'] - ($prodotto["Quantita"]));
    $p = $dbhost->getProductById($prodotto['Id_prodotto'])[0];
    foreach($templateParams['admins'] as $admin) {
        if(intval($p['Scorta']) <= 0) {
            $nome = $p["Nome"];
            $dbhost->addNewMessage('Esaurimento Scorte', "Attenzione! Il peluche " . $nome . " è esaurito. Aggiorna le scorte per non lasciare i nostri clienti a mani vuote!", $admin['E_mail']);
        }
    }
    $dbhost->removeProductFromCart($utente ,$prodotto["Id_prodotto"]);
}

$userdetails = $dbhost->getUserDetails($utente);
foreach($templateParams['admins'] as $admin) {
    $dbhost->addNewMessage('Nuovo Ordine', "Un nuovo ordine è stato effettuato! L'utente " . $userdetails['Nome'] . ' ' . $userdetails['Cognome'] . " ha appena fatto il suo acquisto, puoi vedere tutti i dettagli direttamente dal tuo profilo.", $admin['E_mail']);    
}

$dbhost->updateUserPoints($utente, $punti);
$dbhost->addNewMessage('Nuovo Ordine', 'Il tuo ordine è stato confermato e i tuoi peluche stanno per mettersi in viaggio! Puoi seguire il loro percorso dal tuo profilo. Grazie per averci scelto!', $utente);

unset($_SESSION["totalecarrello"]);
unset($_SESSION["totaleordine"]);
unset($_SESSION["spedizione"]);
unset($_SESSION['puntiusati']);

header("Location: conferma.php?p=$p");
exit;

?>