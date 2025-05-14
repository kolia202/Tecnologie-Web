<?php
require_once 'bootstrap.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isUserLoggedIn()) {
    echo json_encode(["status" => "not_logged_in", "message" => "Accesso non eseguito"]);
    exit;
}

try {
    if (isset($data["id"]) && isset($data["quantity"])) {
        $idprodotto = $data["id"];
        $quantita = $data["quantity"];
        $cartProduct = $dbhost->getCartProductById($_SESSION["utente"], $idprodotto);
        $prodotto = $dbhost->getProductById($idprodotto)[0];        
        $cartQuantity = 0;
        if ($cartProduct != null) {
            $cartQuantity = $cartProduct["Quantita"];
        }
        if (($cartQuantity + $quantita) > $prodotto["Scorta"]) {
            error_log("Quantità non disponibile per il prodotto: " . $idprodotto);
            echo json_encode(["status" => "not_available", "message" => "Quantità non disponibile"]);
            exit;
        }
        $dbhost->updateCart($_SESSION["utente"], $idprodotto, $quantita);
        $cart = $dbhost->getCartProducts($_SESSION["utente"]);

        echo json_encode(["status" => "success", "message" => "Carrello aggiornato", "cart" => $cart]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => "Errore del server: " . $e->getMessage()]);
}

?>
