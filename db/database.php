<?php
class DatabaseHelper {
    private $db;
    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: ");
        }
    }

    public function getMediaVoti() {
        $stmt = $this->db->prepare("
            SELECT AVG(Voto) AS media_voti FROM recensione
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["media_voti"] ? number_format($row["media_voti"], 1) : "0.0";
    }

    public function getNumeroRecensioni() {
        $stmt = $this->db->prepare("
            SELECT COUNT(*) AS numero_recensioni FROM recensione
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["numero_recensioni"];
    }

    public function getNomiFotoPrezziProdottiCasuali() {
        $n = 3;
        $stmt = $this->db->prepare("SELECT Nome, Prezzo, Immagine FROM prodotto ORDER BY RAND() LIMIT ?");
        $stmt->bind_param("i", $n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTestoRecensioniCasuali() {
        $s=3;
        $stmt = $this->db->prepare("SELECT Commento FROM recensione ORDER BY RAND() LIMIT ?");
        $stmt->bind_param("i", $s);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}    
?>