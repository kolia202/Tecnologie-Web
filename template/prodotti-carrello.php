<h1>Carrello</h1>

<?php if(count($templateParams["carrello"]) == 0): ?>
    <article>
        <p>Il tuo carrello è vuoto</p>
        <div class="text-center">
            <a href="../php/prodotti.php" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Torna al negozio</a>
        </div>
    </article>
<?php
    else:
        foreach($templateParams["carrello"] as $prodotto): ?>
            <section>
                <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                    <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" class="img-fluid" alt=""/>
                    <h2><?php echo $prodotto["Nome"]; ?></h2>
                </a>
                <a href="../php/elimina-carrello.php?&id=<?php echo $prodotto["Id_prodotto"]; ?>">
                    <button type="button" class="btn">
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </a>
                <div class="d-flex">
                    <p>Quantità: </p>
                    <button type="button" class="btn decrease" id="<?php echo $prodotto["Id_prodotto"]; ?>">
                        <i class="bi bi-dash-circle"></i>
                    </button>                
                    <p class="quantity"><?php echo $prodotto["Quantita"]; ?></p>
                    <button type="button" class="btn increase" id="<?php echo $prodotto["Id_prodotto"]; ?>">
                        <i class="bi bi-plus-circle"></i>
                    </button>
                </div>
                <p class="product-price">Prezzo: <?php echo getFormattedPrice(($prodotto["Prezzo"] * $prodotto["Quantita"])); ?></p>
                <p class="product-points">Punti: <?php echo $prodotto["Prezzo_punti"] * $prodotto["Quantita"]; ?></p>
            </section>
        <?php endforeach; ?>
        <h2 class="total-price">Totale Carrello: <?php echo getFormattedPrice($totale); ?></h2>  
        <div class="text-center">
            <a href="../php/spedizione.php" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Procedi con l'ordine</a>
        </div>
<?php endif; ?>