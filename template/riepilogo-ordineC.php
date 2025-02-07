<h1 class="text-center account">Riepilogo Ordine</h1>
<div class="row mt-4">
<?php foreach($templateParams["carrello"] as $prodotto): ?>
    <div class="row mt-4">
        <div class="col-12 col-md-4 mb-5">
            <section class="custom-col">
            <a class="prodotto-carrello-a" href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                <img class="imgCar" src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" class="img-fluid" alt=""/>
                <h2 class="nomeProdottoC"><?php echo $prodotto["Nome"]; ?></h2>
            </a>
            <p class="text-muted"><?php echo $prodotto["Quantita"] . "x" . getFormattedPrice($prodotto["Prezzo"]); ?></p>
            </section>
        </div>
    </div>
<?php endforeach; ?>
</div>
<h4 class="text-center totale-carrello">Spedizione: <?php echo getFormattedPrice($costospedizione) ?></h4>
<h2 class="text-center totale-finale">Totale: <?php echo getFormattedPrice($_SESSION["totalecarrello"] + $costospedizione); ?></h2>
<form method="POST" action="aggiungi-ordine.php">
    <div class="text-center">
        <button type="submit" class="btn btn-sm fw-bold button-invia mt-4 mb-5">Conferma Ordine</button>
    </div>
</form>
