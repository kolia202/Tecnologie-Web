<h1>Riepilogo Ordine</h1>

<?php foreach($templateParams["carrello"] as $prodotto): ?>
    <section class="d-flex align-items-center border-bottom">
        <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>" style="width: 50%;">
            <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" class="img-fluid" alt=""/>
        </a>
        <div class="d-flex flex-column">
            <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                <p><?php echo $prodotto["Nome"]; ?></p>
            </a>
            <p class="text-muted"><?php echo $prodotto["Quantita"] . "x" . getFormattedPrice($prodotto["Prezzo"]); ?></p>
        </div>
    </section>
<?php endforeach; ?>
<h4>Spedizione: <?php echo getFormattedPrice($costospedizione) ?></h4>
<h2>Totale: <?php echo getFormattedPrice($_SESSION["totalecarrello"] + $costospedizione); ?></h2>        
<form method="POST" action="aggiungi-ordine.php">
    <div class="text-center">
        <button type="submit" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Conferma Ordine</button>
    </div>
</form>