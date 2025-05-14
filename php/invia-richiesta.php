<?php
require_once 'bootstrap.php';

$data = json_decode(file_get_contents("php://input"), true);

try {
    if (isset($data["utente"]) && isset($data["idprodotto"])) {
        $dbhost->addAvailabilityNotice($data["utente"], $data["idprodotto"]);        
        echo json_encode(["status" => "success", "message" => "Richiesta inviata"]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => "Errore del server: " . $e->getMessage()]);
}

?>
