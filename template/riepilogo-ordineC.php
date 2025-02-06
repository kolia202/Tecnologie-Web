<h1>Riepilogo Ordine</h1>

<?php foreach($templateParams["carrello"] as $prodotto): ?>
    <div class="col-12 col-md-4 mb-5">
    <section class="custom-col">
        <a class="prodotto-carrello-a" href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
            <img class="imgCar" src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" class="img-fluid" alt=""/>
            <h2 class="nomeProdottoC"><?php echo $prodotto["Nome"]; ?></h2>
        </a>
        <p class="text-muted"><?php echo $prodotto["Quantita"] . "x" . getFormattedPrice($prodotto["Prezzo"]); ?></p>
    </section>
</div>
<?php endforeach; ?>
<h4 class="text-center">Spedizione: <?php echo getFormattedPrice($costospedizione) ?></h4>
<h2 class="text-center">Totale: <?php echo getFormattedPrice($_SESSION["totalecarrello"] + $costospedizione); ?></h2>
<form method="POST" action="aggiungi-ordine.php">
    <div class="text-center">
        <button type="submit" class="btn btn-sm fw-bold mt-3 mb-4 ordinib" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Conferma Ordine</button>
    </div>
</form>


