<h1>Dettaglio Ordine #<?php echo $ordine["Id_ordine"] ?></h1>

<?php foreach($templateParams["prodottiordinati"] as $prodotto): ?>
    <section class="d-flex align-items-center border-bottom">
        <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" class="img-fluid" style="width: 50%" alt=""/>
        <div class="d-flex flex-column">
            <p><?php echo $prodotto["Nome"]; ?></p>
            <p class="text-muted"><strong>Quantità: </strong><?php echo $prodotto["Quantita"] ?></p>
        </div>
    </section>
<?php endforeach; ?>
<h2>Totale: <?php echo getFormattedPrice($ordine["Prezzo_finale"]); ?></h2>