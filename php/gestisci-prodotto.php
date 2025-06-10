<?php
require_once 'bootstrap.php';

if(isset($_POST["num-scorte"]) && isset($_POST['idprodotto'])) {
    $id = $_POST['idprodotto'];
    $dbhost->updateStock($id, $_POST['num-scorte']);
    $templateParams["avvisi"] = $dbhost->getProductAvailabilityNotice($id);
    $nome = $dbhost->getProductById($id)[0]["Nome"];
    foreach($templateParams['avvisi'] as $avviso) {
        $dbhost->addNewMessage('Peluche Disponibile', "Buone notizie! Il peluche " . $nome . " che stavi aspettando è finalmente tornato disponibile! Corri a prenderlo prima che finisca di nuovo!", $avviso['E_mail']);
        $dbhost->deleteAvailabilityNotice($avviso['id_avviso']);
    }
    header("Location: dettaglioProdotto.php?id=$id");
    exit;
}

if(isset($_POST["attivaprodotto"])) {
    $id = $_POST['attivaprodotto'];
    $dbhost->changeProductVisibility(1, $id);
    header("Location: dettaglioProdotto.php?id=$id");
    exit;
}

if(isset($_POST["disattivaprodotto"])) {
    $id = $_POST['disattivaprodotto'];
    $dbhost->changeProductVisibility(0, $id);
    $dbhost->removeProductFromCarts($id);
    $dbhost->removeFromFavourites($id);
    header("Location: dettaglioProdotto.php?id=$id");
    exit;
}

if(isset($_POST["eliminaprodotto"])) {
    $id = $_POST['eliminaprodotto'];
    $peluche = $dbhost->getProductById($id)[0];
    $dbhost->deleteProduct($id);
    $_SESSION['eliminapeluche'] = 'Peluche ' . $peluche['Nome'] . ' eliminato con successo!';
    header("Location: prodotti.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
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

    if(isset($_POST['aggiungiprodotto'])) {
        $scorte = $_POST['scorteprodotto'];
        $id = $dbhost->addNewProduct($nome, $descrizione, $immagine, $taglia, $scorte, $prezzo, $punti, $categoria);
        header("Location: dettaglioProdotto.php?id=$id");
        exit;
    } else if(isset($_POST['modificaprodotto'])) {
        $id = $_POST['idprodotto'];
        $dbhost->modifyProduct($id, $nome, $descrizione, $immagine, $taglia, $prezzo, $punti, $categoria);
        header("Location: dettaglioProdotto.php?id=$id");
        exit;
    }
}

?>