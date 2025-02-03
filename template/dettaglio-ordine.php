<h1>Dettaglio Ordine #<?php echo $ordine["Id_ordine"] ?></h1>

<?php foreach($templateParams["prodottiordinati"] as $prodotto): ?>
    <section class="d-flex align-items-center border-bottom">
        <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>" style="width: 50%;">
            <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" class="img-fluid" alt=""/>
        </a>
        <div class="d-flex flex-column">
            <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                <p><?php echo $prodotto["Nome"]; ?></p>
            </a>
            <p class="text-muted"><strong>Quantità: </strong><?php echo $prodotto["Quantita"] ?></p>
        </div>
    </section>
<?php endforeach; ?>
<h2>Totale: <?php echo getFormattedPrice($ordine["Prezzo_finale"]); ?></h2>