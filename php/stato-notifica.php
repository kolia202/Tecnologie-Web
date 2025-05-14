<?php
require_once 'bootstrap.php';

$data = json_decode(file_get_contents("php://input"), true);

try {
    if (isset($data["id"])) {
        $dbhost->changeMessageStatus($data["id"]);
        echo json_encode(["status" => "success", "message" => "Stato notifica cambiato"]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => "Errore del server: " . $e->getMessage()]);
}

?>
