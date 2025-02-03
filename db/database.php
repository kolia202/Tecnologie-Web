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
        $query = "SELECT Id_prodotto, Nome, Immagine, Prezzo, Nome_categoria FROM prodotto ORDER BY RAND()";
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
        $query = "SELECT Id_prodotto, Nome, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria FROM prodotto WHERE Id_prodotto=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getUserDetails($email) {
        $query = "SELECT E_mail, Nome, Cognome, Numero_telefono, Data_di_nascita, Punti FROM UTENTE WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getCartProducts($email) {
        $query = "SELECT c.E_mail, c.Id_prodotto, c.Quantita, p.Nome, p.Immagine, p.Scorta, p.Prezzo, p.Prezzo_punti FROM carrello c, prodotto p WHERE c.E_mail=? AND c.Id_prodotto = p.Id_prodotto";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTotalCartPrice($email) {
        $query = "SELECT SUM(Prezzo * Quantita) AS totale FROM carrello c JOIN prodotto p ON c.Id_prodotto = p.Id_prodotto WHERE c.E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["totale"];
    }

    public function updateCart($email, $idprodotto, $quantita) {
        $query = "SELECT Quantita FROM carrello WHERE E_mail = ? AND Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $email, $idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $newQuantity = $row['Quantita'] + $quantita;
    
            $query = "UPDATE carrello SET Quantita = ? WHERE E_mail = ? AND Id_prodotto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('isi', $newQuantity, $email, $idprodotto);
            return $stmt->execute();
        } else {
            $quantita = 1;
            $query = "INSERT INTO carrello (E_mail, Id_prodotto, Quantita) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sii', $email, $idprodotto, $quantita);
            return $stmt->execute();
        }
    }

    public function removeProductFromCart($email, $idprodotto) {
        $query = "DELETE FROM carrello WHERE E_mail = ? AND Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si',$email, $idprodotto);
        return $stmt->execute();
    }

    public function getProductsByCategory($categoryName) {
        $query = "SELECT * FROM prodotto WHERE Nome_categoria = ? ORDER BY RAND()";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNumberCartProducts($email) {
        $query = "SELECT SUM(Quantita) AS numeroprodotti FROM carrello WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["numeroprodotti"] !== NULL ? $row["numeroprodotti"] : 0;
    }

    public function getPreferiti($email) {
        $query = "SELECT p.Id_prodotto, p.Nome, p.Immagine, p.Prezzo, p.Prezzo_punti 
                  FROM preferito pr 
                  JOIN prodotto p ON pr.Id_prodotto = p.Id_prodotto 
                  WHERE pr.E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addPreferito($email, $idprodotto) {
        $query = "SELECT * FROM preferito WHERE E_mail = ? AND Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $email, $idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return false;
        }
        $query = "INSERT INTO preferito (E_mail, Id_prodotto) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $email, $idprodotto);
        return $stmt->execute();
    }

    public function removePreferito($email, $idprodotto) {
        $query = "DELETE FROM preferito WHERE E_mail = ? AND Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $email, $idprodotto);
        return $stmt->execute();
    }

    public function getShippingTypes() {
        $query = "SELECT * FROM metodo_di_spedizione";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getPaymentTypes() {
        $query = "SELECT * FROM metodo_di_pagamento WHERE visibile = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getShippingPrice($id) {
        $query = "SELECT Costo FROM metodo_di_spedizione WHERE Id_spedizione = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["Costo"];
    }
    
    public function addNewOrder($email, $totale, $idspedizione, $idpagamento) {
        $query = "INSERT INTO ordine (Data_effettuazione, Prezzo_finale, Stato, Id_spedizione, Id_pagamento, E_mail) VALUES (CURDATE(), ?, 'In lavorazione', ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('diis', $totale, $idspedizione, $idpagamento, $email);
        $stmt->execute();
        return $this->db->insert_id;
    }
    
    public function addOrderedProduct($idordine, $idprodotto, $quantita) {
        $query = "INSERT INTO prodotto_ordinato (Id_ordine, Id_prodotto, Quantita) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $idordine, $idprodotto, $quantita);
        return $stmt->execute();
    }

    public function updateStock($idprodotto, $quantita) {
        $query = "UPDATE prodotto SET Scorta = Scorta - ? WHERE Id_prodotto = ? AND Scorta >= ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $quantita, $idprodotto, $quantita);
        return $stmt->execute();         
    }

    public function getTotalCartPoints($email) {
        $query = "SELECT SUM(Prezzo_punti * Quantita) AS totalepunti FROM carrello c JOIN prodotto p ON c.Id_prodotto = p.Id_prodotto WHERE c.E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["totalepunti"];
    }

    public function updateUserPoints($email, $punti) {
        $query = "UPDATE utente SET Punti = Punti + ? WHERE E_mail = ? AND Punti >= ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('isi', $punti, $email, $punti);
        return $stmt->execute();
    }

    public function getSearchedProducts($search) {
        $query = "SELECT Id_prodotto, Nome, Immagine, Prezzo, Nome_categoria FROM prodotto WHERE Nome LIKE ?";
        $stmt = $this->db->prepare($query);
        $search = "%" . $search . "%";
        $stmt->bind_param('s', $search);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addAvailabilityNotice($email, $idprodotto) {
        $query = "INSERT INTO avvisi_disponibilita (E_mail, Id_prodotto) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $email, $idprodotto);
        return $stmt->execute();
    }

    public function getCartProductById($email, $idprodotto) {
        $query = "SELECT * FROM carrello WHERE E_mail = ? AND Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $email, $idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getAllRecensioni() {
        $query = "SELECT u.Nome, u.Cognome, r.Voto, r.Commento, r.Data
                  FROM RECENSIONE r
                  JOIN UTENTE u ON r.E_mail = u.E_mail";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addRecensione($email, $voto, $commento) {
        $data = date("Y-m-d"); 
        $query = "INSERT INTO recensione (E_mail, Voto, Commento, Data) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('siss', $email, $voto, $commento, $data);
        return $stmt->execute();
    }
    
    
    public function getRecensioniByEmail($email) {
        $query = "SELECT * FROM recensione WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function removeRecensione($email, $idrecensione) {
        $query = "DELETE FROM recensione WHERE E_mail = ? AND Id_recensione = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $email, $idrecensione);
        return $stmt->execute();
    }

    public function getAllVotiRecensioni() {
        $query = "SELECT Voto FROM recensione";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*public function updateOrdersStatus() {
        $query = "UPDATE ordine SET Stato = CASE
            WHEN Stato = 'in lavorazione' AND DATEDIFF(CURDATE(), Data_effettuazione) >= 1 THEN 'spedito'
            WHEN Stato = 'spedito' AND DATEDIFF(CURDATE(), Data_effettuazione) >= 2 THEN 'in consegna'
            WHEN Stato = 'in consegna' AND DATEDIFF(CURDATE(), Data_effettuazione) >= 3 THEN 'consegnato'
            ELSE Stato
        END 
        WHERE Stato IN ('in lavorazione', 'spedito', 'in consegna') AND E_mail = ?";
    }*/

    public function getAllUserOrders($email) {
        $query = "SELECT Id_ordine, Data_effettuazione, Prezzo_finale, Stato, Id_spedizione FROM ordine WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderById($idordine) {
        $query = "SELECT * FROM ordine WHERE Id_ordine = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idordine);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();        
    }

    public function getOrderedProducts($idordine) {
        $query = "SELECT po.Id_prodotto, po.Quantita, p.Nome, p.Immagine FROM prodotto_ordinato po, prodotto p WHERE Id_ordine = ? AND po.Id_prodotto = p.Id_prodotto";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idordine);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function modificaProfilo($email, $nome, $cognome, $datadinascita, $numerotelefono) {
        $query = "UPDATE utente SET Nome = ?, Cognome = ?, Data_di_nascita = ?, Numero_telefono = ? WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss', $nome, $cognome, $datadinascita, $numerotelefono, $email);
        return $stmt->execute();
    }
    
}
?>