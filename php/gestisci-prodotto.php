<?php
require_once 'bootstrap.php';
session_start();

if(isset($_POST["nuove-scorte"]) && isset($_POST['idprodotto'])) {
    $id = $_POST['idprodotto'];
    $dbhost->updateStock($id, $_POST['nuove-scorte']);
    header("Location: dettaglioProdotto.php?id=$id");
}

if(isset($_POST["attivaprodotto"]) && isset($_POST['idprodotto'])) {
    $id = $_POST['idprodotto'];
    $dbhost->changeProductVisibility(1, $id);
    header("Location: dettaglioProdotto.php?id=$id");
}

if(isset($_POST["disattivaprodotto"]) && isset($_POST['idprodotto'])) {
    $id = $_POST['idprodotto'];
    $dbhost->changeProductVisibility(0, $id);
    $dbhost->removeProductFromCarts($id);
    $dbhost->removeFromFavourites($id);
    header("Location: dettaglioProdotto.php?id=$id");
}

if(isset($_POST["eliminaprodotto"]) && isset($_POST['idprodotto'])) {
    $id = $_POST['idprodotto'];
    $dbhost->deleteProduct($id);
    header("Location: prodotti.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['idprodotto'];
    $nome = $_POST['nomeprodotto'];
    $categoria = $_POST['categoriaprodotto'];
    $taglia = $_POST['tagliaprodotto'];
    $prezzo = $_POST['prezzoprodotto'];
    $punti = $_POST['puntiprodotto'];
    $descrizione = $_POST['descrizioneprodotto'];

    if(isset($_FILES['immagineprodotto']) && $_FILES['immagineprodotto']['error'] == 0) {
        $file = $_FILES['immagineprodotto'];
        $path = IMG_DIR . basename($file['name']);
        if(move_uploaded_file($file['tmp_name'], $path)) {
            echo 'ok';
            $immagine = basename($file['name']);
        } else {
            echo 'errore';
            exit;
        }
    } else {
        $immagine = $_POST['immagineattuale'];
    }

    $dbhost->modifyProduct($id, $nome, $descrizione, $immagine, $taglia, $prezzo, $punti, $categoria);
    header("Location: dettaglioProdotto.php?id=$id");

}

?>