<?php
require_once 'bootstrap.php';
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["id"]) && isset($data["quantity"])) {
    $idprodotto = $data["id"];
    $quantita = $data["quantity"];

    $dbhost->updateCart($_SESSION["utente"], $idprodotto, $quantita);
}

echo json_encode(["status" => "success", "message" => "Carrello aggiornato"]);

?>
