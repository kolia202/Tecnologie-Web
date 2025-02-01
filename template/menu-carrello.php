<?php if(!isUserLoggedIn()) : ?>
    <p>Per visualizzare il carrello, accedi al tuo account</p>
    <a href="../php/account.php" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Accedi</a>
<?php else: ?>
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
            <h2 class="total-price">Totale Carrello: <?php echo getFormattedPrice($totale); ?></h2>        
            <div class="text-center">
                <a href="../php/carrello.php" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Visualizza carrello</a>
            </div>
    <?php endif; ?>
<?php endif; ?>