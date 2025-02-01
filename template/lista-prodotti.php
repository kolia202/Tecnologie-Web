<h1>Tutti i peluches</h1>
<?php foreach($templateParams["prodotti"] as $prodotto): ?>
    <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
        <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt=""/>
        <h2><?php echo $prodotto["Nome"]; ?></h2>
    </a>
    <p><?php echo $prodotto["Nome_categoria"]; ?></p>
    <p><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
    <div class="text-center">
        <a href="../php/gestisci-carrello.php?action=1&id=<?php echo $prodotto["Id_prodotto"]; ?>">
            <button type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Aggiungi al carrello</button>
        </a>
    </div>
<?php endforeach; ?>
