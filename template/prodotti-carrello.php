<h1>Carrello</h1>

<?php if(count($templateParams["prodotti"]) == 0): ?>
    <article>
        <p>Il tuo carrello è vuoto</p>
        <div class="text-center">
            <a href="../php/prodotti.php">
                <button type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Torna al negozio</button>
            </a>
        </div>
    </article>
<?php
    else:
        foreach($templateParams["prodotti"] as $prodotto): ?>
            <section>
                <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                    <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt=""/>
                    <h2>Prodotto: <?php echo $prodotto["Nome"]; ?></h2>
                </a>
                <p>Quantità : <?php echo $prodotto["Quantita"]; ?></p>
                <p>Prezzo: <?php echo getFormattedPrice(($prodotto["Prezzo"] * $prodotto["Quantita"])); ?></p>
                <p>Punti: <?php echo $prodotto["Prezzo_punti"]; ?></p>
            </section>
        <?php endforeach; ?>
        <h2>Totale Carrello: <?php echo getFormattedPrice($totale); ?></h2>
        <div class="text-center">
            <a href="#">
                <button type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Procedi con l'ordine</button>
            </a>
        </div>
<?php endif; ?>