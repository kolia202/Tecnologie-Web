<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'bootstrap.php';
session_start();

$data = json_decode(file_get_contents("php://input"), true);

try {
    if (isset($data["id"]) && isset($data["quantity"])) {
        $idprodotto = $data["id"];
        $quantita = $data["quantity"];
        $dbhost->updateCart($_SESSION["utente"], $idprodotto, $quantita);
        $cart = $dbhost->getCartProducts($_SESSION["utente"]);
        echo json_encode(["status" => "success", "message" => "Carrello aggiornato", "cart" => $cart]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => "Errore del server: " . $e->getMessage()]);
}

?>
