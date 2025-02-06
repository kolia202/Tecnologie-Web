<h1>Dettaglio Ordine #<?php echo $ordine["Id_ordine"] ?></h1>

<div class="row mt-4">
<?php foreach($templateParams["prodottiordinati"] as $prodotto): ?>
    <div class="col-12 col-md-4 mb-5">
    <section class="custom-col">
        <a class="prodotto-carrello-a" href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
            <img class="imgCar" src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" class="img-fluid" alt=""/>
            <h2 class="nomeProdottoC"><?php echo $prodotto["Nome"]; ?></h2>
        </a>
        <p class="text-center text-muted"><strong>Quantità: </strong><?php echo $prodotto["Quantita"] ?></p>
    </section>
    </div>
<?php endforeach; ?>
</div>
<h2 class="text-center mb-5 totalee">Totale: <?php echo getFormattedPrice($ordine["Prezzo_finale"]); ?></h2>