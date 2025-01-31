<?php
class DatabaseHelper {
    private $db;
    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed");
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
        $stmt = $this->db->prepare("SELECT Id_prodotto, Nome, Prezzo, Immagine FROM prodotto ORDER BY RAND() LIMIT ?");
        $stmt->bind_param("i", $n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategories() {
        $stmt = $this->db->prepare("SELECT * FROM categoria");
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

    public function checkLogin($email, $password){
        $stmt = $this->db->prepare("SELECT * FROM UTENTE WHERE E_mail = ? AND Password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrazione($nome, $cognome, $email, $password, $dataDiNascita, $numeroTelefono) {
        $stmt = $this->db->prepare("INSERT INTO UTENTE (Nome, Cognome, E_mail, Password, Data_di_nascita, Numero_telefono)
                                    VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nome, $cognome, $email, $password, $dataDiNascita, $numeroTelefono);
        return $stmt->execute();
    }

    public function checkEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM UTENTE WHERE E_mail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function getProducts() {
        $query = "SELECT Id_prodotto, Nome, Immagine, Prezzo, Nome_categoria FROM prodotto";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function updatePassword($email, $newPassword) {
        $stmt = $this->db->prepare("UPDATE UTENTE SET Password = ? WHERE E_mail = ?");
        $stmt->bind_param("ss", $newPassword, $email);
        return $stmt->execute();
    }

    public function getProductById($id) {
        $query = "SELECT Id_prodotto, Nome, Descrizione, Immagine, Grandezza, Prezzo, Prezzo_punti, Nome_categoria FROM prodotto WHERE Id_prodotto=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}    
?>