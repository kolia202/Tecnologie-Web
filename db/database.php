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
        $stmt = $this->db->prepare("SELECT Id_prodotto, Nome, Prezzo, Immagine FROM prodotto WHERE attivo = 1 ORDER BY RAND() LIMIT ?");
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
        $query = "SELECT Id_prodotto, Nome, Immagine, Scorta, Prezzo, Nome_categoria FROM prodotto WHERE attivo = 1 ORDER BY RAND()";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdminProducts() {
        $query = "SELECT Id_prodotto, Nome, Immagine, Scorta, Prezzo, Nome_categoria, attivo FROM prodotto ORDER BY RAND()";
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
        $query = "SELECT Id_prodotto, Nome, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria, attivo FROM prodotto WHERE Id_prodotto = ?";
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
        $query = "SELECT * FROM prodotto WHERE Nome_categoria = ? AND attivo = 1 ORDER BY RAND()";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdminProductsByCategory($categoryName) {
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

    public function isPreferito($email, $idprodotto) {
        $query = "SELECT COUNT(*) AS ispreferito FROM preferito WHERE E_mail = ? AND Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $email, $idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["ispreferito"];
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
        $query = "UPDATE prodotto SET Scorta = Scorta + ? WHERE Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $quantita, $idprodotto);
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
        $query = "SELECT Id_prodotto, Nome, Immagine, Scorta, Prezzo, Nome_categoria FROM prodotto WHERE attivo = 1 AND Nome LIKE ?";
        $stmt = $this->db->prepare($query);
        $search = "%" . $search . "%";
        $stmt->bind_param('s', $search);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdminSearchedProducts($search) {
        $query = "SELECT Id_prodotto, Nome, Immagine, Scorta, Prezzo, Nome_categoria, attivo FROM prodotto WHERE Nome LIKE ?";
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

    public function modificaProfilo($email, $nome, $cognome, $newemail, $datadinascita, $numerotelefono) {
        $query = "UPDATE utente SET Nome = ?, Cognome = ?, E_mail = ?, Data_di_nascita = ?, Numero_telefono = ? WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss', $nome, $cognome, $newemail, $datadinascita, $numerotelefono, $email);
        return $stmt->execute();
    }
    
    public function addNewMessage($tiponotifica, $testo, $email) {
        $query = "INSERT INTO notifica (Tipo_notifica, Testo, Giorno, E_mail) VALUES (?, ?, CURDATE(), ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $tiponotifica, $testo, $email);
        return $stmt->execute();
    }

    public function getUserMessages($email) {
        $query = "SELECT * FROM notifica WHERE E_mail = ? ORDER BY Giorno DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteMessage($idnotifica) {
        $query = "DELETE FROM notifica WHERE Id_notifica = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $idnotifica);
        return $stmt->execute();
    }

    public function changeMessageStatus($idnotifica) {
        $query = "UPDATE notifica SET Stato = 1 WHERE Id_notifica = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idnotifica);
        return $stmt->execute();
    }

    public function emailExists($email) {
        $query = "SELECT EXISTS(SELECT 1 FROM UTENTE WHERE E_mail = ?) AS esiste";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return (bool) $row['esiste'];
    }
    
    public function getUserNewMessages($email) {
        $query = "SELECT COUNT(*) AS nuovenotifiche FROM notifica WHERE E_mail = ? AND Stato = 0";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["nuovenotifiche"];
    }
    
    public function notificationExists($email, $tiponotifica, $testo) {
        $query = "SELECT EXISTS(SELECT 1 FROM notifica WHERE E_mail = ? AND Tipo_notifica = ? AND Testo = ?) AS esiste";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $email, $tiponotifica, $testo);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return (bool) $row['esiste'];
    }

    public function modifyProduct($idprodotto, $nome, $descrizione, $immagine, $taglia, $prezzo, $punti, $categoria) {
        $query = "UPDATE prodotto SET Nome = ?, Descrizione = ?, Immagine = ?, Grandezza = ?, Prezzo = ?, Prezzo_punti = ?, Nome_categoria = ? WHERE Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssdisi', $nome, $descrizione, $immagine, $taglia, $prezzo, $punti, $categoria, $idprodotto);
        return $stmt->execute();
    }

    public function changeProductVisibility($attivo, $idprodotto) {
        $query = "UPDATE prodotto SET attivo = ? WHERE Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $attivo, $idprodotto);
        return $stmt->execute();
    }

    public function removeProductFromCarts($idprodotto) {
        $query = "DELETE FROM carrello WHERE Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        return $stmt->execute();
    }

    public function removeFromFavourites($idprodotto) {
        $query = "DELETE FROM preferito WHERE Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $idprodotto);
        return $stmt->execute();
    }

    public function deleteProduct($idprodotto) {
        $query = "DELETE FROM prodotto WHERE Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $idprodotto);
        return $stmt->execute();        
    }

    public function addNewProduct($nome, $descrizione, $immagine, $taglia, $scorta, $prezzo, $punti, $categoria) {
        $query = "INSERT INTO prodotto (Nome, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssidis', $nome, $descrizione, $immagine, $taglia, $scorta, $prezzo, $punti, $categoria);
        $stmt->execute();
        return $this->db->insert_id;
    }

    public function getProductAvailabilityNotice($idprodotto) {
        $query = "SELECT * FROM avvisi_disponibilita WHERE Id_prodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idprodotto);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);        
    }

    public function deleteAvailabilityNotice($idavviso) {
        $query = "DELETE FROM avvisi_disponibilita WHERE id_avviso = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $idavviso);
        return $stmt->execute();        
    }

    public function getAdmins() {
        $query = "SELECT E_mail FROM utente WHERE Admin = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);      
    }

    public function deleteRecensione($idrecensione) {
            $query = "DELETE FROM RECENSIONE WHERE Id_recensione = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $idrecensione);
            return $stmt->execute();
        } 

    public function getIdRecensioneByNomeCognome($nome, $cognome) {
        $query = "SELECT r.Id_recensione 
                  FROM recensione r
                  JOIN utente u ON r.E_mail = u.E_mail
                  WHERE u.Nome = ? AND u.Cognome = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $nome, $cognome);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getShippingById($idspedizione) {
        $query = "SELECT * FROM metodo_di_spedizione WHERE Id_spedizione = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $idspedizione);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getAllOrders() {
        $query = "SELECT * FROM ordine ORDER BY Data_effettuazione DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateOrderStatus($orderId, $status) {
        $query = "UPDATE ORDINE SET Stato = ? WHERE Id_ordine = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $status, $orderId);
        return $stmt->execute();
    }

    public function getEmail($nome, $cognome) {
        $query = "SELECT E_mail FROM utente WHERE Nome = ? AND Cognome = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $nome, $cognome);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row ? $row['E_mail'] : null;
    }

    public function getAllUtentiNonAdmin() {
        $query = "SELECT * FROM utente WHERE Admin = 0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function deleteUtente($email) {
        $query = "DELETE FROM utente WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        return $stmt->execute();
    }

    public function deleteOrdersByEmail($email) {
        $query = "DELETE FROM ordine WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        return $stmt->execute();
    }

    public function deleteNotificaByEmail($email) {
        $query = "DELETE FROM notifica WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        return $stmt->execute();
    }

    public function deleteCarrelloByEmail($email) {
        $query = "DELETE FROM carrello WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        return $stmt->execute();
    }

    public function deletePreferitoByEmail($email) {
        $query = "DELETE FROM preferito WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        return $stmt->execute();
    }

    public function deleteRecensioneByEmail($email) {
        $query = "DELETE FROM recensione WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        return $stmt->execute();
    }

    public function deleteAvvisoDisponibilitaByEmail($email) {
        $query = "DELETE FROM avvisi_disponibilita WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        return $stmt->execute();
    }
}
?>